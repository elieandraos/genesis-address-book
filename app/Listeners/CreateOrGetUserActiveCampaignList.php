<?php

namespace App\Listeners;

use Log;
use Cache;
use App\Events\UserLoggedIn;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateOrGetUserActiveCampaignList
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserLoggedIn  $event
     * @return void
     */
    public function handle(UserLoggedIn $event)
    {
        $user = $event->user;
        $activeCampaign = $event->activeCampaign;

        //if the list id is cached, don't proceed.
        if(Cache::get($user->active_campagin_list))
            return;

        $list = array(
            "name"           =>  $user->active_campagin_list,
            "sender_name"    => "My Company",
            "sender_addr1"   => "123 S. Street",
            "sender_city"    => "Chicago",
            "sender_zip"     => "60601",
            "sender_country" => "USA",
        );

        $response = $activeCampaign->api('list/add', $list);
        
        if ((int)$response->success) 
        {
            //all okay cache the list id.
            Cache::forever($user->active_campagin_list, (int)$response->id );
        }
        else
            Log::info($response->error);
    }
}
