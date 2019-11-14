<?php
/**
 * Classe abstraite employée pour filtrer les modèles
 * Source: https://blog.jgrossi.com/2018/queryfilter-a-model-filtering-concept/
 */

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use ReflectionMethod;
use ReflectionParameter;

abstract class QueryFilter
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @var Builder
     */
    protected $builder;

    /**
     * QueryFilter constructor.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * The apply() method receives a Builder instance, gets all fields from the Request, checks if
     * there’s a method called $field(), and if true, calls that method sending the field value as parameter.
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     */
    public function apply(Builder $builder)
    {
        $this->builder = $builder;

        foreach ($this->fields() as $field => $value)
        {
            $method = Str::camel($field);
            $value = array_filter([$value]);

            if(method_exists($this, $method)) {
                if ($this->shouldCall($method, $value)) {
                    call_user_func_array([$this, $method], $value);
                }
            }

        }
    }

    /**
     * @return array
     */
    protected function fields()
    {
        return $this->request->all();
    }

    /**
     * Make sure the method should be called
     *
     * @param string $methodName
     * @param array $value
     * @return bool
     */
    protected function shouldCall($methodName, array $value)
    {
        if (!method_exists($this, $methodName)) {
            return false;
        }
        $method = new ReflectionMethod($this, $methodName);
        /** @var ReflectionParameter $parameter */
        $parameter = Arr::first($method->getParameters());
        return $value ? $method->getNumberOfParameters() > 0 :
            $parameter === null || $parameter->isDefaultValueAvailable();
    }
}
