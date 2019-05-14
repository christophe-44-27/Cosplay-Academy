<?php

namespace App\Nova;

use Laravel\Nova\Fields\Avatar;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Panel;

class User extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\\User';

    /**
     * Resource group displayed on the sidebar
     * @var string
     */
    public static $group = 'Administration';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'name', 'firstname', 'lastname', 'email',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            new Panel('Informations personnelles', $this->personnalInformations()),
            new Panel('Mes réseaux sociaux', $this->socialNetworks()),
            new Panel('Mes compétences de cosplayeur(se)', $this->cosplayPanel()),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }

    /**
     * @return array
     */
    protected function personnalInformations() {
        return [
            Avatar::make('Profile picture')
                ->disk('public')
                ->path('users')
                ->preview(function () {
                    if (empty($this)) {
                        return;
                    }
                    return '/storage/' . $this->profile_picture;
                }),

            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Trix::make('Description')
                ->sortable()
                ->rules('required'),

            Text::make('Firstname')
                ->sortable()
                ->rules('max:255'),

            Text::make('Lastname')
                ->sortable()
                ->rules('max:255'),

            Text::make('Email')
                ->sortable()
                ->rules('required', 'email', 'max:254')
                ->creationRules('unique:users,email')
                ->updateRules('unique:users,email,{{resourceId}}'),
        ];
    }

    /**
     * @return array
     */
    protected function socialNetworks() {
        return [
            Text::make('Facebook page'),
            Text::make('Twitter page'),
            Text::make('Instagram page'),
            Text::make('Youtube page'),
            Text::make('Website'),
        ];
    }

    protected function cosplayPanel() {
        return [
            BelongsToMany::make('Categories')
        ];
    }
}
