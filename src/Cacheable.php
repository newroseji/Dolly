<?php

namespace Dhukuti\Dolly;

trait Cacheable{

    public function getCacheKey(){

        // app\Card/1-13241234124

        return sprintf("%s/%s-%s",
            get_class($this),
            $this->id,
            $this->updated_at->timestamp
        );
    }
}