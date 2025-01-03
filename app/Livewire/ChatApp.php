<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Message;

class ChatApp extends Component
{
    public int $userId;
    public string $body = '';

    public function mount()
    {
        $this->userId = auth()->id();
    }

    public function render()
    {
        $messages = Message::with('user')
            ->latest()
            ->take(10)
            ->get()
            ->sortBy('id');

        return view('livewire.chat-app',compact('messages'))->layout('layouts.app');
    }

    public function sendMessage(): void
    {
       
        Message::create([
            'user_id' => $this->userId,
            'body' => $this->body,
        ]);

        $this->reset('body');
    }
}
