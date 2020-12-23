<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class organization_table extends Model
{
    protected $table = 'tbl_organization_table';
    protected $fillable = ['id','id_floor','table_title','table_type','table_status'];
    public $timestamps = false;
    protected $primaryKey = 'id';
}
