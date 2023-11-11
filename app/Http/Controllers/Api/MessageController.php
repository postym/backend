<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Http\Requests\MessageRequest;

class MessageController extends Controller
{
  /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Message::all();
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(MessageRequest $request)
    {
        $validated = $request->validated();

        $message = Message::create($validated);

        return $message;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $message = Message::findOrFail($id);

        return $message;
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $message = Message::findOrFail($id);

        $message->delete();

        return $message;
    }
}
