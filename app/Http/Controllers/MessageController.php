<?php

namespace App\Http\Controllers;

use App\Models\EmailAnswer;
use App\Models\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Jobs\SendEmail;
use Maatwebsite\Excel\Concerns\ToArray;

class MessageController extends Controller
{
    public function index()
    {
        $msgs = Message::orderBy('created_at', 'Desc')
            ->paginate(10);
        return view('dashboard/dashboard', ['msgs' => $msgs]);
    }

    public function getByCountry()
    {
        $msgs = DB::table('messages')->select(['code'])
            ->selectRaw('country, COUNT(*) as count')
            ->groupBy('country', 'code')
            ->orderBy('count', 'desc')
            ->paginate(50);
        return view('dashboard/dashboard', ['msgs' => $msgs]);
    }

    public function create(Request $request)
    {
        if (!$msg = Message::find($request->id)) return redirect()->back()->with(['success' => false, 'message' => "Not found"]);
        $data = [
            "id" => $msg->id,
            "name" => $msg->name,
            "email" => $msg->email,
            "country" => $msg->country,
            "city" => $msg->city,
            "region" => $msg->region,
            "code" => $msg->code,
            "created_at" => $msg->created_at,
            "subject" => $msg->subject,
            "msg" => $msg->msg,
            "answers_count" => $msg->answers->count(),
        ];
        return view('/dashboard/dashboard', ["msg" => $data]);
    }

    public function sendMsg(Request $request)
    {
        if (!$msg = Message::find($request->id)) return redirect()->back()->with(['success' => false, 'message' => "Not found"]);
        $validator = Validator::make($request->only('subject', 'message_body'), [
            'subject' => ['required', 'string', 'min:2', 'max:255'],
            'message_body' => ['required', 'string', 'min:2', 'max:8000']
        ]);
        if ($validator->fails())
            return redirect()->back()->withErrors($validator)->withInput();
        $answer = EmailAnswer::create([
            'msg_id' => $msg->id,
            'subject' => $request->subject,
            'body' => $request->message_body,
        ]);
        $msg->answered_at = Carbon::now()->format('Y-m-d');
        $msg->save();
        $details = [
            "email" => $msg->email,
            "subject" => $answer->subject,
            "body" => $answer->body,
        ];
        dispatch(new SendEmail($details, "emailAnswer"));
        return redirect('/dashboard/messages')->with(['success' => true, 'message' => "The message has been sent to " . $msg->name]);
    }

    public function getAnswers(Request $request)
    {
        if (!$msg = Message::find($request->id)) return redirect()->back()->with(['success' => false, 'message' => "Not found"]);
        $data = [
            "msg_id" => $msg->id,
            "answers" => $msg->answers
        ];
        return view('/dashboard/dashboard', ["answers" => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(Request $request)
    {
        if (!$msg = Message::find($request->id)) return redirect()->back()->with(['success' => false, 'message' => "Not found"]);
        $msg->delete();
        return redirect()->back()->with(['success' => true, 'message' => "Message from " . $msg->name . "  has been deleted"]);
    }

    public function answer(Request $request)
    {
        if (!$msg = Message::find($request->id)) return redirect()->back()->with(['success' => false, 'message' => "Not found"]);
        if (!$msg->answered_at) {
            $msg->answered_at = Carbon::now()->format('Y-m-d');
            $message = "Message from " . $msg->name . "  has been checked as answered";
        } else {
            $msg->answered_at = null;
            $message = "Message from " . $msg->name . "  has been checked as NOT answered";
        }
        $msg->save();
        return redirect()->back()->with(['success' => true, 'message' => $message]);
    }
}
