<?php
namespace Laracasts\Dolly;


class BladeDirective
{

    protected $keys = [];
    protected $cache;

    public function __construct(RussianCaching $cache)
    {
        $this->cache = $cache;

    }

    public function setUp($model)
    {

        // Turn On output buffering
        ob_start();

        $this->keys[] = $key = $model->getCacheKey();


        // return a boolean that indicates if we have cached this model yet
        return $this->cache->has($key);


    }

    public function tearDown()
    {
        return $this->cache->put(
            array_pop($this->keys),
            ob_get_clean()
        );
    }
}