<?php

namespace App\Providers;
use App\Services\Newsletter;
use MailchimpMarketing\ApiClient;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind(Newsletter::class,function(){

            $client = (new ApiClient())->setConfig([
                'apiKey'=>config('services.mailchimp.key'),
                'server'=>'us20'
            ]);

            return new Newsletter($client);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       Gate::define('admin',function(User $user){
            return $user->username === 'waiyankyaw';
       });
    }
}
