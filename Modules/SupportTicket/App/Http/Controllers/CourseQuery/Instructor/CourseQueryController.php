<?php

namespace Modules\SupportTicket\App\Http\Controllers\CourseQuery\Instructor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Course\App\Models\Course;
use Modules\SupportTicket\App\Models\SupportTicket;
use Modules\SupportTicket\App\Models\MessageDocument;
use Modules\SupportTicket\App\Models\SupportTicketMessage;

class CourseQueryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = Auth::guard('web')->user();

        $support_tickets = SupportTicket::withWhereHas('course', function($query) use($user){
            $query->where('user_id', $user->id);
        })->where('admin_type', 'instructor')->latest()->get();

        return view('supportticket::coursequery.instructor.index', [
            'support_tickets' => $support_tickets
        ]);
    }


    /**
     * Show the specified resource.
     */
    public function show($ticket_id)
    {

        $user = Auth::guard('web')->user();

        $support_ticket = SupportTicket::withWhereHas('course', function($query) use($user){
            $query->where('user_id', $user->id);
        })->where('admin_type', 'instructor')->where('ticket_id', $ticket_id)->firstOrFail();

        $ticket_messages = SupportTicketMessage::with('documents')->where('support_ticket_id', $support_ticket->id)->get();

        $last_message = SupportTicketMessage::with('documents')->where('support_ticket_id', $support_ticket->id)->latest()->first();

        $course = Course::with('instructor')->findOrFail($support_ticket->course_id);

        return view('supportticket::coursequery.instructor.show', [
            'support_ticket' => $support_ticket,
            'ticket_messages' => $ticket_messages,
            'last_message' => $last_message,
            'course' => $course,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function support_ticket_message(Request $request, $id)
    {

        $request->validate([
            'message' => 'required',
        ],
        [
            'message.required' => trans('translate.Message is required'),
        ]);

        $user = Auth::guard('web')->user();

        $support_ticket = SupportTicket::where('id', $id)->firstOrFail();

        $ticket_message = new SupportTicketMessage();
        $ticket_message->support_ticket_id = $support_ticket->id;
        $ticket_message->message = $request->message;
        $ticket_message->send_by = 'admin';
        $ticket_message->message_author_id = $user->id;
        $ticket_message->save();


        if($request->hasFile('documents')){
            foreach($request->documents as $index => $request_file){
                $extention = $request_file->getClientOriginalExtension();
                $file_name = 'teacher-support-'.time().$index.'.'.$extention;
                $destinationPath = public_path('uploads/custom-images/');
                $request_file->move($destinationPath,$file_name);

                $document = new MessageDocument();
                $document->message_id = $ticket_message->id;
                $document->file_name = $file_name;
                $document->model_name = 'SupportTicketMessage';
                $document->save();
            }
        }


        $notify_message = trans('translate.Message send successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);


    }

    public function close($id){
        $support_ticket = SupportTicket::where('id', $id)->firstOrFail();
        $support_ticket->status = 'closed';
        $support_ticket->save();


        $notify_message= trans('translate.Ticket Closed Successfully');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->route('instructor.teacher-supports')->with($notify_message);

    }

}
