<?php

namespace App;

use App\Models\Role;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable 
{
    use Notifiable;
    use HasRoles;

    protected $primaryKey = 'UserID';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','active', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function UserInfo()
    {
        return $this->hasone('App\Models\UserInfo','UserID');
    }

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function getActive(){
        return   $this -> active == 1 ? 'مفعل'  : 'غير مفعل';
    }
}
