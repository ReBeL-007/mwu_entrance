<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\AdminResetPasswordNotification;
use App\Permissions\HasPermissionsTrait;
use Illuminate\Database\Eloquent\SoftDeletes;


class Admin extends Authenticatable
{
    use Notifiable, HasPermissionsTrait, SoftDeletes;

    protected $guard = 'admin';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'mobile','default_password','merchant_no','official_seal','authorized_signature','form_charge'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','default_password',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPasswordNotification($token));
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'admins_roles');

    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'admins_permissions');

    }

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'admins_groups');

    }

    public function answers() {
        return $this->hasMany(Answer::class,'admin_id');
     }

    public function forms() {

        return $this->hasMany(Form::class,'campus');
            
    }

    public function exams() {

        return $this->hasMany(Exam::class,'campus');
            
    }
    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }
}
