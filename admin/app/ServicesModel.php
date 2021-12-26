<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicesModel extends Model
{
    protected $table = 'services';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'bigint';
    public $timestamps = false;
}
