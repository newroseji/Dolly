<?php

class CacheableTest extends TestCase
{

    /** @test */
    function it_gets_a_unique_cache_key_for_an_eloquent_model()
    {

// eloquent model instance that uses Cacheable trait.
        $model = $this->makePost();

        // verify the returned value.
        $this->assertEquals(
            'Post/1-' . $model->updated_at->timestamp,
            $model->getCacheKey()
        );
    }

}