<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectModel extends Model
{

    protected $table = 'projects';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'bigint';
    public $timestamps = false;
}
