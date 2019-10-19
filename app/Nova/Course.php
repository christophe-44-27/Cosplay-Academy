<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Trix;

class Course extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Course';

    /**
     * Resource group displayed on the sidebar
     * @var string
     */
    public static $group = 'Apprentissage';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'title',
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
            ID::make()->sortable(),
            Image::make('thumbnail_picture')
                ->disk('public')
                ->path("courses/thumbnails")->maxWidth(258),
            Image::make('main_picture')->hideFromIndex(),
            Text::make('title')->sortable(),
            Text::make('nb_views')->hideWhenUpdating()->hideWhenCreating(),
            Text::make('nb_likes')->hideWhenUpdating()->hideWhenCreating(),
            Trix::make('content')->hideFromIndex()->withFiles('trix_course'),
            Select::make('difficulty')->options([
                '1' => 'Débutant',
                '2' => "Intermédiaire",
                '3' => "Expert"
            ])->hideFromIndex(),
            HasMany::make('sessions')->hideFromIndex()

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
        return [
            new Filters\CourseAuthorFilter('user_id')
        ];
    }

    /**
     * The default value of the filter.
     *
     * @var string
     */
    public function default()
    {
        return [
            new Filters\CourseAuthorFilter('user_id')
        ];
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
}
