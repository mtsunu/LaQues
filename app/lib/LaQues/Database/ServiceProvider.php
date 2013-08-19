<?php


namespace LaQues\Database;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'LaQues\Database\Contracts\SurveyRepositoryInterface',
            'LaQues\Database\Eloquent\SurveyRepository'
        );
    }
}