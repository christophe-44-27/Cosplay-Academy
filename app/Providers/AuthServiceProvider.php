<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Course;
use App\Policies\CategoryPolicy;
use App\Policies\CountryPolicy;
use App\Policies\TutorialPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        Course::class => TutorialPolicy::class,
        Category::class => CategoryPolicy::class,
        Country::class => CountryPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        //
    }
}
