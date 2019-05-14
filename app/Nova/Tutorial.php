<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\MorphMany;
use Laravel\Nova\Fields\MorphToMany;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Text;
use Illuminate\Support\Str;
use Laravel\Nova\Panel;

class Tutorial extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Tutorial';

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
        'id', 'thumbnail_picture', 'title', 'nb_views', 'nb_likes', 'is_published', 'created_at', 'updated_at',
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
            Image::make('Thumbnail picture')
                ->thumbnail(function () {
                    if (empty($this)) {
                        return '/public/images/thumbnail-tutorial-empty.png';
                    }
                    return '/storage/' . $this->thumbnail_picture;
                })
                ->preview(function () {
                    if (empty($this)) {
                        return '/public/images/thumbnail-tutorial-empty.png';
                    }
                    return '/storage/' . $this->thumbnail_picture;
                })
                ->path('tutorials/thumbnails')
                ->storeAs(function (Request $request) {
                    return $request->thumbnail_picture->getClientOriginalName();
                }),

            Image::make('Main picture')
                ->thumbnail(function () {
                    if (empty($this)) {
                        return '/public/images/thumbnail-tutorial-empty.png';
                    }
                    return '/storage/' . $this->main_picture;
                })
                ->preview(function () {
                    if (empty($this)) {
                        return '/public/images/thumbnail-tutorial-empty.png';
                    }
                    return '/storage/' . $this->main_picture;
                })
                ->path('tutorials/covers')
                ->storeAs(function (Request $request) {
                    return $request->main_picture->getClientOriginalName();
                }),

            Text::make('Title')
                ->sortable()
                ->rules('required', 'max:255'),

            BelongsTo::make('category'),

            Trix::make('content'),

            Text::make('content')
                ->onlyOnIndex()
                ->displayUsing(function($id) {
                    $part = strip_tags(Str::substr($id, 0, 30));
                    return $part . " ...";
                }),

            Boolean::make('is_published'),

            MorphMany::make('documents')
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
     * Build an "index" query for the given resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->where('user_id', $request->user()->id);
    }

    /**
     * Build a "relatable" query for the given resource.
     *
     * This query determines which instances of the model may be attached to other resources.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function relatableQuery(NovaRequest $request, $query)
    {
        return $query->where('user_id', $request->user()->id);
    }
}
