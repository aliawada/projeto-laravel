<?php

namespace App\Entities;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;

    public $timestamps      = true;
    protected $table        = 'users';
    protected $fillable     = ['cpf', 'name', 'phone', 'birth', 'gender', 'notes', 'email', 'password', 'status', 'permission'];
    protected $hidden       = ['password', 'remember_token'];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = \env('PASSWORD_HASH') ? bcrypt($value) : $value;
    }

    public function getCpfAttribute()
    {
        $cpf = $this->attributes['cpf'];
        return \substr($cpf, 0, 3) . '.' . \substr($cpf, 3, 3) . '.' . \substr($cpf, 7, 3) . '-' . \substr($cpf, -2);
    }

    public function getPhoneAttribute()
    {
        $phone = $this->attributes['phone'];
        return '(' . \substr($phone, 0, 2) .') '. \substr($phone, 2, 4) .'-' . \substr($phone, -4);
    }

    public function getBirthAttribute()
    {
        $birth = $this->attributes['birth'];
        return  date('d/m/Y', strtotime($birth));
    }

}