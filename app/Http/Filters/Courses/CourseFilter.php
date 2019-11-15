<?php

namespace App\Http\Filters\Courses;


use App\Http\Filters\QueryFilter;

class CourseFilter extends QueryFilter
{
    /**
     * @param string $keywords
     */
    public function keywords(string $keywords)
    {
        $this->builder->whereRaw("MATCH(title, introduction) AGAINST('*" . $keywords . "*' IN BOOLEAN MODE)");
    }

    /**
     * @param array $categories
     */
    public function categories(array $categories)
    {
        $this->builder->whereIn('category_id', $categories);
    }

    /**
     * @param array $difficulties
     */
    public function difficulties(array $difficulties)
    {
        $this->builder->whereIn('difficulty', $difficulties);
    }

    /**
     * @param array $types
     */
    public function types(array $types)
    {
        $this->builder->whereIn('type_id', $types);
    }
}
