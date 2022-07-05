<?php

namespace App\Providers;

use App\Models\Adminnotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    //this notification for restaurant manager
        view()->composer(
            ['layouts.restaurantManagerLayout', 'layouts.deliveryManagerLayout'],
            function ($view) {
                $ManagerID = Auth::user()->user_id;
                $notifications = Adminnotification::get();
                $UsersNotifications = array();
                foreach ($notifications as $notification){
                    $notification->ReceiverID = json_decode( $notification->ReceiverID);
                    foreach ($notification->ReceiverID  as $ReceiverID ){
                        if ($ManagerID == $ReceiverID){
                            array_push($UsersNotifications ,$notification);
                        }
                    }
                }
                $view->with('user_notifications',$UsersNotifications );
            }
        );
    //this to force production in heroku (deployed env)
        if($this->app->environment('production')) {
            \URL::forceScheme('https');
        }
    }
}
