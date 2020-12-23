<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class account_type extends Model
{
    protected $table = 'tbl_account_type';
    protected $fillable = ['id','type_account','description'];
    public $timestamps = false;
    protected $primaryKey = 'id';
}
