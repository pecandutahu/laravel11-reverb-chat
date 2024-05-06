<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function postMessage(Request $request, $roomId)
    {
        $userName = 'User_' . Str::random(4);
        $messageContent = $request->input('message');
        MessageSent::dispatch($userName, $roomId, $messageContent);
        return response()->json(['status' => 'Message sent successfully.']);
    }
}
