<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class User extends Model {
  protected $table = 'users';
  // return $this->hasMany('App\Models\Prueba', 'foreign_key', 'id_user');
}