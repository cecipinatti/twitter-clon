<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

// php artisan make:controller TweetsController

class TweetsController extends Controller
{
    //
    public function index()
    {
        // Recupera todos los tweets
        /* $tweets = Tweet::orderBy('created_at', 'DESC')->get(); */
        // eager loading (optimización)
        $tweets = Tweet::orderBy('created_at', 'DESC')
            ->with(['user', 'replies'])
            ->get();

        // Recupero variables de session
        $notify_tweet_published = session()->get('notify_tweet_published', false);
        $notify_tweet_updated = session()->get('notify_tweet_updated', false);
        $notify_tweet_deleted = session()->get('notify_tweet_deleted', false);

        $notify_reply_published = session()->get('notify_reply_published', false);
        $notify_reply_updated = session()->get('notify_reply_updated', false);
        $notify_reply_deleted = session()->get('notify_reply_deleted', false);

        // Pasarlos a la vista para que los muestre
        return view('tweets/index', [
            'tweets' => $tweets,
            'notify_tweet_published' => $notify_tweet_published,
            'notify_tweet_updated' => $notify_tweet_updated,
            'notify_tweet_deleted' => $notify_tweet_deleted,

            'notify_reply_published' => $notify_reply_published,
            'notify_reply_updated' => $notify_reply_updated,
            'notify_reply_deleted' => $notify_reply_deleted
        ]);
    }



    //
    public function create()
    {
        return view('tweets.create', [
            'tweet' => ''
        ]);
    }



    //
    public function edit(Tweet $tweet, Request $request)
    {
        /*
            // Validación de limpieza
            $tweet_id = (int) $request->input('tweet_id');

            if ( $tweet_id == 0 )
            {
                abort(400);
            }


            // Validación del recurso
            $tweet = Tweet::find($tweet_id);

            if ( is_null($tweet) )
            {
                abort(404);
            }
        */
        if ( $tweet->user_id != auth()->id() )
        {
            abort(403);
        }

        return view('tweets.edit', [
            'tweet' => $tweet
        ]);
    }


    public function update(Tweet $tweet, Request $request)
    {
        $validated = $request->validate([
            'tweet' => ['required', 'min:4', 'max:140'],
            // 'tweet_id' => ['required', 'int']
        ]);

        // dd($validated);
        // $tweet = Tweet::find($validated['tweet_id']);

        $tweet->message = $validated['tweet'];
        $tweet->save();

        // Registro el evento que sucedió: actualicé un tweet
        session()->flash('notify_tweet_updated', true);

        return redirect()->route('tweets');
    }



    //
    public function delete(Tweet $tweet, Request $request)
    {
        if ( $tweet->user_id != auth()->id() )
        {
            abort(403);
        }

        return view('tweets.delete', [
            'tweet' => $tweet
        ]);
    }


    public function destroy(Tweet $tweet, Request $request)
    {
        $tweet->delete();

        // Registro el evento que sucedió: eliminé un tweet
        session()->flash('notify_tweet_deleted', true);

        return redirect()->route('tweets');
    }



    //
    public function store(Request $request)
    {
        /*
            $tweet = $request->input('tweet');
            $name = $request->input('name');

            $has_error = false;
            $errors_bag = [];


            if ( $tweet == '' )
            {
                $has_error = true;
                $errors_bag['tweet'] = 'El campo tweet es obligatorio';
            }
            else
            {
                if ( strlen($tweet) < 4 )
                {
                    $has_error = true;
                    $errors_bag['tweet'] = 'Tweet debe tener al menos 4 caracteres';
                }

                if (strlen($tweet) > 20 ) {
                    $has_error = true;
                    $errors_bag['tweet'] = 'Tweet debe tener cómo máximo 20 caracteres';
                }
            }

            if ($name == '') {
                $has_error = true;
                $errors_bag['name'] = 'El campo nombre es obligatorio';
            } else {
                if (strlen($name) < 3) {
                    $has_error = true;
                    $errors_bag['name'] = 'El nombre debe tener al menos 3 caracteres';
                }

                if (strlen($name) > 15) {
                    $has_error = true;
                    $errors_bag['name'] = 'El nombre debe tener cómo máximo 15 caracteres';
                }
            }
        */

        $validated = $request->validate([
            'tweet' => ['required', 'min:4', 'max:140']
        ]);

        // Creamos el modelo...
        $new_tweet = new Tweet;
        $new_tweet->message = $validated['tweet'];
        $new_tweet->user_id = auth()->user()->id;
         // ... y lo guardamos
        $new_tweet->save();

        // Registro el evento que sucedió: publiqué un tweet
        session()->flash('notify_tweet_published', true);

        return redirect()->route('tweets');
        /*
            }

            return view('tweets.create', [
                'has_error'     => $has_error,
                'errors_bag'    => $errors_bag,
                'tweet' => $tweet,
                'name' => $name
            ]);
            */

            /*
            // Validation
            /*
            $this->validate($request, [
                'tweet' => ['required', 'min:4', 'max:140']
            ]);
        */
    }
}
