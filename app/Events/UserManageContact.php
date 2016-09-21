<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UserManageContact extends Event
{
    use SerializesModels;

    public $contact, $action;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($contact, $action)
    {
        $this->contact = $contact;
        $this->action = $action;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
