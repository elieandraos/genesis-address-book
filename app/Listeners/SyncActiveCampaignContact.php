<?php

namespace App\Listeners;

use Log;
use Cache;
use App\Events\UserManageContact;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SyncActiveCampaignContact
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
        $activeCampaign = $event->activeCampaign;
        $contact = $event->contact;
        $action = $event->action;
        $user = $event->user;
        $list_id = Cache::get($user->active_campaign_list);

        if(!in_array($action, $this->actions))
            return;

        switch ($action) {
            case 'add': case 'edit':
               $this->syncContact($contact, $activeCampaign, $list_id);
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
     * @param type $list_id 
     * @return type
     */
    protected function syncContact($contact, $activeCampaign, $list_id)
    {
        $fields = [];
        foreach($contact->fields as $key => $field)
            $fields["field[".$key.",0]"] = $field->value;

        $post = array(
            'email'                    => $contact->email,
            'first_name'               => $contact->name,
            'last_name'                => '',
            'phone'                    => $contact->phone,
            'p['.$list_id.']'          => $list_id,
            'status['.$list_id.']'     => 1, 
            'instantresponders['.$list_id.']' => 0
        );

        $post = array_merge($post, $fields);
        $response = $activeCampaign->api('contact/sync', $post);
        
        if((int)$response->success)
        {
            //cache the contact id of the list
            //$contact_id = (int)$response->subscriber_id;
        }
        else
        {
            Log::info('Active Campaign Sync Contact Error: '.$response->error);
        }
    } 
}
