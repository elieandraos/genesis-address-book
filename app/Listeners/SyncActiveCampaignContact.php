<?php

namespace App\Listeners;

use Log;
use Cache;
use App\Events\UserManageContact;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SyncActiveCampaignContact implements ShouldQueue
{
    protected $actions;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        $this->actions = ['add', 'edit', 'delete'];
    }

    /**
     * Handle the event.
     *
     * @param  UserManageContact  $event
     * @return void
     */
    public function handle(UserManageContact $event)
    {
        $activeCampaign = app('ActiveCampaign');
        $contact = $event->contact;
        $action = $event->action;

        if(!in_array($action, $this->actions))
            return;

        switch ($action) {
            case 'add': case 'edit':
                $this->syncContact($contact, $activeCampaign);
                break;
            default:
                break;
        }
        
    }

    /**
     * Add/Edit the contact in active campaign.
     * 
     * @param type $contact 
     * @param type $activeCampaign 
     * @return type
     */
    protected function syncContact($contact, $activeCampaign)
    {
        $post = array(
            'email'                    => $contact->email,
            'first_name'               => $contact->name,
            'last_name'                => '',
            'phone'                    => $contact->phone,
        );

        // foreach($contact->fields as $key => $field)
        //     $post[ rawurlencode("field[".$key.",0]")] = $field->value;
        
        //$post = array_merge($post, $fields);
        
        $response = $activeCampaign->api('contact/sync', $post);
        
        if(!(int)$response->success)
            Log::info('Active Campaign Sync Contact Error: '.$response->error);
    }
}

