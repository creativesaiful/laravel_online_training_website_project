<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhotoTableModel extends Model
{
    protected $table = 'photos';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'bigint';
    public $timestamps = false;
}
