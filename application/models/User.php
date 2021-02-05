<?php


namespace application\models;


use Illuminate\Database\Eloquent\Model;

class User extends Model {
    protected $table = "users";
    protected $fillable = ['name'];

//    public function articles() {
//        return $this->hasMany('\Models\Article');
//    }
}
