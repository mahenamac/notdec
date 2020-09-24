<?php

namespace App\Listeners;
use Auth;
use App\Events\UserLogged;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Carbon\Carbon;
class RecordLogin
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
     * @param  UserLogged  $event
     * @return void
     */
    public function handle(UserLogged $event)
    {
        $user = Auth::user();
        $user->last_login = Carbon::now();
        $user->save();
    }
}
