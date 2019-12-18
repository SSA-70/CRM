<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Places extends Model
{
    public function users(){
        return $this->hasMany('App/Users');
    }
}
