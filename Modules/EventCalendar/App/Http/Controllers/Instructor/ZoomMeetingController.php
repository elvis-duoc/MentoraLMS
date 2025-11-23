<?php

namespace Modules\EventCalendar\App\Http\Controllers\Instructor;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Modules\Course\App\Models\Course;
use Modules\EventCalendar\App\Models\Meeting;
use Modules\EventCalendar\App\Services\ZoomMeetingService;

class ZoomMeetingController extends Controller
{

    protected $zoomService;

    public function __construct(ZoomMeetingService $zoomService)
    {
        $this->zoomService = $zoomService;
    }


    public function redirectToZoom()
    {

        $user = Auth::guard('web')->user();

        $zoomAuthUrl = 'https://zoom.us/oauth/authorize?' . http_build_query([
            'response_type' => 'code',
            'client_id' => $user->zoom_api_key,
            'redirect_uri' => route('instructor.zoom.callback')
        ]);

        return redirect($zoomAuthUrl);
    }


    public function handleZoomCallback(Request $request)
    {
        $user = Auth::guard('web')->user();

        $code = $request->input('code');

        try{
            $response = Http::withBasicAuth($user->zoom_api_key, $user->zoom_api_secret)
            ->asForm()
            ->post('https://zoom.us/oauth/token', [
                'grant_type' => 'authorization_code',
                'code' => $code,
                'redirect_uri' => route('instructor.zoom.callback'),
            ]);

            if ($response->successful()) {

                $tokens = $response->json();

                if(isset($tokens['access_token'], $tokens['refresh_token'])) {
                    $user = User::findOrFail(Auth::guard('web')->id());

                    $user->update([
                        'zoom_access_token' => $tokens['access_token'] ?? '',
                        'zoom_refresh_token' => $tokens['refresh_token'] ?? '',
                        'zoom_token_expiry' => now()->addSeconds($tokens['expires_in'] - 10)->timestamp
                    ]);


                    $notify_message= trans('translate.Authorized successfully');
                    $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
                    return redirect()->route('instructor.zoom-meeting.create')->with($notify_message);

                }else{
                    throw new \Exception(trans('translate.Authorization failed'));
                }

            }else{
                throw new \Exception('Zoom API request failed: ' . $response->body());
            }

        }catch(\Exception $e){
            Log::error('Zoom OAuth callback error: ' . $e->getMessage());

            $notify_message= trans('translate.Authorization failed');
            $notify_message=array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->route('instructor.zoom-setting')->with($notify_message);

        }

    }

    /**
     * Show the specified resource.
     */
    public function create()
    {

        $user = Auth::guard('web')->user();

        if(!$user->zoom_api_key){
            $notify_message= trans('translate.Please provide zoom credential');
            $notify_message=array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->route('instructor.zoom-setting')->with($notify_message);
        }

        if(!$user->zoom_access_token){
            return redirect()->route('instructor.zoom.auth');
        }

        $courses = Course::with('category')->where('user_id', $user->id)->latest()->get();

        return view('eventcalendar::instructor.zoom_create', [
            'user' => $user,
            'courses' => $courses,
        ]);


    }

    public function store(Request $request)
    {

        $data = $request->validate([
                'title' => 'required|string|max:255',
                'start_time' => 'required',
                'duration' => 'required|integer',
                'course_id' => 'required|integer|exists:courses,id',
            ],
            [
                'course_id.required' => trans('translate.Course is required'),
                'title.required' => trans('translate.Title is required'),
                'start_time.required' => trans('translate.Start time is required'),
                'duration.required' => trans('translate.Duration is required'),
            ]
        );

        try {
            $user = Auth::guard('web')->user();

            $meeting = $this->zoomService->createZoomMeeting($user, $data);

            $notify_message = trans('translate.Meeting created successfully');
            $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
            return redirect()->back()->with($notify_message);

        } catch (\Exception $e) {

            Log::error('Zoom meeting creation error: ' . $e->getMessage());

            $notify_message = trans('translate.Meeting created successfully');
            $notify_message = array('message' => $e->getMessage(), 'alert-type' => 'success');
            return redirect()->back()->with($notify_message);

        }
    }


       /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = Auth::guard('web')->user();

        $meetings = Meeting::with('course')->where('instructor_id', $user->id)->latest()->get();

        return view('eventcalendar::instructor.index', [
            'meetings' => $meetings,
        ]);
    }


    /**
     * Display a listing of the resource.
     */
    public function event_calendar()
    {

        return view('eventcalendar::instructor.event_calendar');
    }

    public function event_calendar_iframe()
    {

        $user = Auth::guard('web')->user();

        $meetings = Meeting::where('instructor_id', $user->id)->get();

        return view('eventcalendar::instructor.calender_body', [
            'meetings' => $meetings,
        ]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function zoom_setting()
    {

        $user = Auth::guard('web')->user();

        return view('eventcalendar::instructor.zoom_setting', [
            'user' => $user,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function update_zoom_setting(Request $request)
    {
        $request->validate([
            'zoom_api_key' => 'required|string',
            'zoom_api_secret' => 'required|string',
        ]);

        $user = Auth::guard('web')->user();

        $user->zoom_api_key = $request->zoom_api_key;
        $user->zoom_api_secret = $request->zoom_api_secret;
        $user->save();

        $notify_message = trans('translate.Zoom meeting credential updated successful');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);

    }


}
