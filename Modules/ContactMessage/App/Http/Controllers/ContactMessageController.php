<?php

namespace Modules\ContactMessage\App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Modules\ContactMessage\App\Models\ContactMessage;

class ContactMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function contact_message()
    {

        $contact_messages = ContactMessage::latest()->get();

        return view('contactmessage::contact_message', [
            'contact_messages' => $contact_messages
        ]);
    }

    public function show_message($id)
    {

        $contact_message = ContactMessage::findOrFail($id);

        return view('contactmessage::show_contact_message', [
            'contact_message' => $contact_message
        ]);
    }

    public function delete_message($id)
    {

        $contact_message = ContactMessage::findOrFail($id);
        $contact_message->delete();

        $notify_message = trans('translate.Deleted successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);
    }


}
