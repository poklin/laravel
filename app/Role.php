<?php

namespace App;

use Zizaco\Entrust\EntrustRole;
use App\Http\Requests;



class Role extends EntrustRole {

    protected $fillable = ['name', 'display_name', 'description'];

}

