<?php

use Illuminate\Database\Capsule\Manager as DB;


abstract class TestCase extends PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        $this->setUpDatabase();
        $this->migrateTables();
    }

    protected function setupDatabase()
    {
        $database = new DB;
        $database->addconnection(['driver' => 'sqlite', 'database' => ':memory:']);
        $database->bootEloquent();
        $database->setAsGlobal();
    }

    protected function migrateTables()
    {
        DB::schema()->create('posts', function ($table) {
            $table->increments('id');
            $table->string('title');
            $table->timestamps();
        });
    }

    protected function makePost()
    {

        $post = new Post;
        $post->title = 'Some title';
        $post->save();

        return $post;

    }
}

class Post extends \Illuminate\Database\Eloquent\Model
{
    use Laracasts\Dolly\Cacheable;
}