<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactModel extends Model
{
    protected $table = 'contact';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'bigint';
    public $timestamps = false;
}
