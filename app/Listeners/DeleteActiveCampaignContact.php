<?php

namespace App\Listeners;

use App\Events\UserDeleteContact;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DeleteActiveCampaignContact implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    
    }

    /**
     * Handle the event.
     *
     * @param  UserDeleteEvent  $event
     * @return void
     */
    public function handle(UserDeleteContact $event)
    {
        $activeCampaign = app('ActiveCampaign');
        $email = $event->email;
        $this->deleteContact($email, $activeCampaign);
    }

    /**
     * Delete the contact in active campaign.
     * @param type $email 
     * @param type $activeCampaign 
     * @return type
     */
    protected function deleteContact($email, $activeCampaign)
    {
        $response = $activeCampaign->api('contact/view?email='.$email);
        if(!(int)$response->success)
           Log::info('Active Campaign View Contact Error: '.$response->error);
       
        //all is good, proceed.
        $id = (int) $response->id;
    
        $response = $activeCampaign->api('contact/delete?id='.$id);

        if(!(int)$response->success)
            Log::info('Active Campaign Delete Contact Error: '.$response->error);
    }
}
