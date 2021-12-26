<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseModel extends Model
{
    protected $table = 'courses';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'bigint';
    public $timestamps = false;
}
