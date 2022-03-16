<?php


namespace App\Filters;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class Filter
{
    /**
     * @var
     */
    protected $request;

    /**
     * @var
     */
    protected $builder;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Apply filters on the builder.
     *
     * @param Builder $builder
     * @return Builder
     */
    public function apply(Builder $builder)
    {
        $this->builder = $builder;

        foreach ($this->getFilters() as $filter => $value) {
            if (method_exists($this, $filter) && !empty($value)) {
                $this->$filter($value);
            }
        }

        return $this->builder;
    }

    /**
     * @return array
     */
    protected function getFilters()
    {
        return $this->request->only($this->filters);
    }

    /**
     * return request property.
     *
     * @return Request
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @param $key
     * @return array|string|null
     */
    public function getRequestHeader($key)
    {
        return $this->request->header($key);
    }

    /**
     * @param $key
     * @return mixed
     */
    public function getRequestKey($key)
    {
        if ($this->request->has($key)) {
            return $this->request->get($key);
        }
        return null;
    }
}
