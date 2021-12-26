<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class projectsModel extends Model
{
    protected $table = 'projects';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'bigint';
    public $timestamps = false;
}
