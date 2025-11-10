<?php

namespace Modules\EventCalendar\App\Services;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Modules\EventCalendar\App\Models\Meeting;

class ZoomMeetingService
{

    public $user;

    // Check if the access token is expired
    public function isTokenExpired()
    {
        $expirationTime = $this->user->zoom_token_expiry;

        return now()->timestamp >= $expirationTime;
    }

    // Refresh the Zoom access token if expired
    public function refreshAccessToken()
    {

        try {
            $response = Http::withBasicAuth(env('ZOOM_API_KEY'), env('ZOOM_API_SECRET'))
                ->asForm()
                ->post('https://zoom.us/oauth/token', [
                    'grant_type' => 'refresh_token',
                    'refresh_token' => $this->user->zoom_refresh_token,
                ]);

            if ($response->failed()) {
                throw new \Exception('Zoom API request failed: ' . $response->body());
            }

            $tokens = $response->json();

            if (!isset($tokens['access_token'])) {
                throw new \Exception('Failed to refresh token: Access token not returned.');
            }

            $this->user->update([
                'zoom_access_token' => $tokens['access_token'],
                'zoom_refresh_token' => $tokens['refresh_token'],
                'zoom_token_expiry' => now()->addSeconds($tokens['expires_in'] - 10)->timestamp
            ]);

            return $tokens['access_token'];

        } catch (\Exception $e) {
            Log::error('Error refreshing Zoom access token: ' . $e->getMessage());

            throw new \Exception('Unable to refresh Zoom access token. Please try again later.');
        }

    }

    // Create a Zoom meeting
    public function createZoomMeeting(User $user, $meetingData)
    {
        $this->user = $user;

        $accessToken = $user->zoom_access_token;

        if ($this->isTokenExpired()) {
            $accessToken = $this->refreshAccessToken();
        }

        $response = Http::withToken($accessToken)->post('https://api.zoom.us/v2/users/me/meetings', [
            'topic' => $meetingData['title'],
            'start_time' => $meetingData['start_time'],
            'duration' => $meetingData['duration'],
            'timezone' => 'UTC',
            'type' => 2,
        ]);

        if ($response->successful()) {

            $meeting = Meeting::create([
                'title' => $meetingData['title'],
                'meeting_id' => $response['id'],
                'meeting_link' => $response['join_url'],
                'instructor_id' => $user->id,
                'course_id' => $meetingData['course_id'],
                'start_time' => $meetingData['start_time'],
                'duration' => $meetingData['duration'],
                'end_time' => Carbon::parse($response['start_time'])->addMinutes($meetingData['duration']),
                'platform' => 'zoom',
            ]);

            return $meeting;
        }

        throw new \Exception('Failed to create Zoom meeting: ' . $response->body());
    }
}
