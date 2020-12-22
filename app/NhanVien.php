<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class NhanVien extends Authenticatable
{
    protected $table = 'nhanvien';
    protected $fillable = ['id','ten','quyen','email','password'];
    protected $primaryKey = 'id';
    public function getAuthPassword()
    {
        return $this->password;
    }
    public function getrole()
    {
        return $this->quyen;
    }
}
