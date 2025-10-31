<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    function index()
    {
        return view('home');
    }

    function chat()
    {
        $messages = session('chat_history', []);
        if (!empty($messages)) {
            foreach ($messages as $msg) {
                if (isset($msg['created_at'])) {
                    $firstMessageTime = \Illuminate\Support\Carbon::parse($msg['created_at']);
                    if ($firstMessageTime->diffInHours(now()) >= 24) {
                        session()->forget('chat_history');
                        $messages = [];
                    }
                    break;
                }
            }
        }
        return view('chat', ['messages' => $messages]);
    }
}
