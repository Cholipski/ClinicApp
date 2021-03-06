<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\CustomResetPasswordNotification;
use App\Notifications\CustomEmailVerificationNotification;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'role_id',
        'pesel',
        'address',
        'phone_number',
        'department',
        'image',
        'education',
        'description',
        'gender',
        'alergies',
        'medicaments',
        'specialist',
        'room',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){
        return $this->hasOne('App\Models\Role','id','role_id');
    }

    public function userAvatar($request){
        $image = $request->file('image');
        $name = $image->hashName();
        $destination = public_path('/images');

        $image->move($destination,$name);

        return $name;
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomResetPasswordNotification($token));
    }
    public function sendEmailVerificationNotification()
    {
        $this->notify(new CustomEmailVerificationNotification);
    }
}
