<?php

namespace application\repository;


use application\models\User;

class Main  {
    public function getUsers() {
        return User::all();
    }
}
