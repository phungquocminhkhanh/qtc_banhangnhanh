<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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
                            'force_sign_out'
                        ];
    public $timestamps = false;
    protected $primaryKey = 'id';
    public function getAuthPassword()
    {
        return $this->account_password;
    }
}
