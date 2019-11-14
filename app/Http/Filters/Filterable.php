<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

trait Filterable
{
    /**
     * Permet de filtrer à la volée grâce à la classe ReservationFilter.
     * Voir info dans la classe QueryFilter
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @param \App\Http\Filters\QueryFilter $filter
     */
    public function scopeFilter(Builder $builder, QueryFilter $filter)
    {
        $filter->apply($builder);
    }
}
