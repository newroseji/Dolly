<?php

use Dhukuti\Dolly\RussianCaching;
use Dhukuti\Dolly\BladeDirective;
/**
 * Created by PhpStorm.
 * User: byanjni
 * Date: 11/9/2016
 * Time: 1:52 PM
 */
class BladeDirectiveTest extends TestCase
{

    protected $doll;

    /** @test */
    function it_sets_up_the_opening_cache_directive()
    {
        // new up the BladeDirective class.
        $directive = $this->createNewCacheDirective();

        // and then call the setUp method.
        $isCached = $directive->setUp($post=$this->makePost());


        // perform assertion.
        $this->assertFalse($isCached);


        echo "<div>fragment</div>";

        // call the tearDown method.
        $cachedFragment=$directive->tearDown();


        // per assertions.
        $this->assertEquals('<div>fragment</div>',$cachedFragment);

        $this->assertTrue($this->doll->has($post));


    }

    /**
     * Create New Cache Directive
     * @return BladeDirective
     */
    protected function createNewCacheDirective()
    {
        $cache = new \Illuminate\Cache\Repository(
            new \Illuminate\Cache\ArrayStore
        );

        $this->doll = new RussianCaching($cache);

        return new BladeDirective($this->doll);
    }

}