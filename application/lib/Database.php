<?php


namespace application\lib;
use Illuminate\Database\Capsule\Manager as Capsule;

class Database {
    function __construct() {
        $capsule = new Capsule;
        $capsule->addConnection([
            "driver" => env('DB_CONNECTION'),
            "host" => env('DB_HOST'),
            "database" => env('DB_DATABASE'),
            "username" => env('DB_USERNAME'),
            "password" => env('DB_PASSWORD'),
            "charset" => "utf8",
            "collation" => "utf8_unicode_ci",
            "prefix" => "",
        ]);

        $capsule->bootEloquent();

    }
}
