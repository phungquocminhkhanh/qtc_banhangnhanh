<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class account_permission extends Model
{
    protected $table = 'tbl_account_permission';
    protected $fillable = ['id','permission','description'];
    public $timestamps = false;
    protected $primaryKey = 'id';
}
