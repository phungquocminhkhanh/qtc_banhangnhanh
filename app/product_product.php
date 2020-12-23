<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_product extends Model
{
    protected $table = 'tbl_product_product';
    protected $fillable = ['id',
                            'id_business',
                            'id_product_category',
                            'product_img',
                            'product_title',
                            'product_code',
                            'product_sales_price',
                            'product_description',
                            'product_point'
                        ];
    public $timestamps = false;
    protected $primaryKey = 'id';
}
