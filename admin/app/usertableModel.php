<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usertableModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'bigint';
    public $timestamps = false;
}
