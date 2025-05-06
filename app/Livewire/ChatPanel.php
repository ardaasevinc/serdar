<?php


namespace App\Livewire;

use Livewire\Component;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ChatPanel extends Component
{
    public $users;
    public $selectedUser = null;
    public $message = '';
    public $messages = [];

    public function mount()
    {
        $this->users = User::where('id', '!=', Auth::id())->get();
    }

    public function selectUser($userId)
    {
        $this->selectedUser = User::find($userId);

        $this->loadMessages();
    }

   
    public function loadMessages()
{
    $this->messages = Message::where(function ($query) {
        $query->where('sender_id', Auth::id())
              ->where('receiver_id', $this->selectedUser->id);
    })
    ->orWhere(function ($query) {
        $query->where('sender_id', $this->selectedUser->id)
              ->where('receiver_id', Auth::id());
    })
    ->orderBy('created_at')
    ->get();

    // Mesajları okunmuş olarak işaretle
    Message::where('sender_id', $this->selectedUser->id)
        ->where('receiver_id', Auth::id())
        ->where('is_read', false)
        ->update(['is_read' => true]);
}
    public function sendMessage()
    {
        if (!$this->selectedUser || $this->message === '') {
            return;
        }

        Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $this->selectedUser->id,
            'message' => $this->message,
        ]);

        $this->message = '';
        $this->loadMessages();
    }

    public function render()
    {
        return view('livewire.chat-panel');
    }

    

    
}
