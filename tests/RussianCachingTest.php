<?php

use Dhukuti\Dolly\RussianCaching;
/**
 * Created by PhpStorm.
 * User: byanjni
 * Date: 11/9/2016
 * Time: 11:14 AM
 */
class RussianCachingTest extends TestCase
{
    /** @test */
    function it_caches_the_given_key()
    {


        $post=$this->makePost();

        // needs composer require illuminate/cache
        $cache = new \Illuminate\Cache\Repository(
            new \Illuminate\Cache\ArrayStore
        );

        $cache= new RussianCaching($cache);

        $cache->put($post,'<div>view fragment</div>');

        $this->assertTrue($cache->has($post->getCacheKey()));

        $this->assertTrue($cache->has($post));
    }
}