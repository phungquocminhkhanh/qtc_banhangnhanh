<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class account_acount extends Authenticatable
{
    protected $table = 'tbl_account_account';
    protected $fillable = ['id',
                            'id_type',
                            'id_business',
                            'account_username',
                            'account_password',
                            'account_fullname',
                            'account_email',
                            'account_phone',
                            'account_status',
                        ];
    public $timestamps = false;
    protected $primaryKey = 'id';
    public function getAuthPassword()
    {
        return $this->account_password;
    }
    public function get_all_account()
    {
        $acc=DB::table('tbl_account_account')
        ->join('tbl_account_type','tbl_account_type.id','=','tbl_account_account.id_type')
        ->select('tbl_account_account.id',
        'tbl_account_account.account_username',
        'tbl_account_account.account_fullname',
        'tbl_account_account.account_phone',
        'tbl_account_account.account_status',
        'tbl_account_type.id as id_type',
        'tbl_account_type.type_account',
        'tbl_account_type.description')
        ->get();
        return $acc;
    }
}
