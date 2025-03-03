<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use App\Models\Tweet;
use Illuminate\Http\Request;

// php artisan make:controller RepliesController

class RepliesController extends Controller
{
    //
    public function create(Request $request, Tweet $tweet)
    {
        return view('replies.create', [
            'reply' => '',
            'tweet' => $tweet
        ]);
    }



    //
    public function edit(Reply $reply)
    {
        return view('replies.edit', [
            'reply' => $reply
        ]);
    }


    public function update(Reply $reply, Request $request)
    {
        $validated = $request->validate([
            'reply' => ['required', 'min:4', 'max:140'],
        ]);

        $reply->message = $validated['reply'];
        $reply->save();

        // Registro el evento que sucedió: se actualizó una respuesta
        session()->flash('notify_reply_updated', true);

        return redirect()->route('tweets');
    }



    //
    public function delete(Reply $reply, Request $request)
    {
        return view('replies.delete', [
            'reply' => $reply
        ]);
    }


    public function destroy(Reply $reply, Request $request)
    {
        $reply->delete();

        // Registro el evento que sucedió: se eliminó una respuesta
        session()->flash('notify_reply_deleted', true);

        return redirect()->route('tweets');
    }



    //
    public function store(Request $request, Tweet $tweet)
    {
        $validated = $request->validate([
            'reply' => 'required|min:4|max:140',
        ]);

        $new_reply = new Reply;
        $new_reply->message = $validated['reply'];
        $new_reply->user_id = auth()->user()->id;
        $new_reply->tweet_id = $tweet->id;

        $new_reply->save();

        // Registro el evento que sucedió: se creó una respuesta
        session()->flash('notify_reply_published', true);

        return redirect()->route('tweets');
    }
}
