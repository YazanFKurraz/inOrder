<?php

namespace App\Http\Controllers\BackEnd;
use App\Http\Requests\backEnd\Message\Store;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Mail\replayContact;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::orderBy('id','desc')->paginate(10);
        return view('back-end.messages.index',compact('messages'));
    }

    public function edit($id)
    {
        $message = Message::findOrFail($id);
        return view('back-end.messages.edit',compact('message'));
    }


    public function replay(Store $request, $id)
    {
        $message = Message::findOrFail($id);
        Mail::send(new replayContact($message,$request->message));
       alert()->success('replay Send Successfully','Done');

        return redirect()->back();

    }

    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();
        alert()->success('Message Deleted Successfuly','done');
        return redirect()->back();
    }
}
