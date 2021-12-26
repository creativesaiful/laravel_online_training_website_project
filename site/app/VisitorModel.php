<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VisitorModel extends Model
{
    protected $table = 'visitor';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'bigint';
    public $timestamps = false;

}
