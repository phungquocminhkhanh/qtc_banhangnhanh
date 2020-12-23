<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order_order extends Model
{
    protected $table = 'tbl_order_order';
    protected $fillable = ['id',
                            'id_business',
                            'id_account',
                            'id_customer',
                            'order_code',
                            'order_location',
                            'order_status',
                            'order_direct_discount',
                            'order_point_discount',
                            'order_total_cost',
                            'order_comment',
                            'order_created'
                        ];
    public $timestamps = false;
    protected $primaryKey = 'id';
}
