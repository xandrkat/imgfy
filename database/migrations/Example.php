<?php 

use Container\Container as App;

App::db()->schema()->create('example', function ($table) {
    $table->increments('id');
    $table->string('email')->unique();
    $table->timestamps();
});