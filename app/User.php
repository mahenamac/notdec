<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Webpatser\Uuid\Uuid;

class User extends Authenticatable
{
    use Notifiable;

    public $incrementing = false;
    protected $guarded = [];
    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {

            $model->id = (string) Uuid::generate();

        });

    }

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

    public function comments(){

        return $this->hasMany('App\Comment');

    }

    public function partners(){

        return $this->belongsToMany('App\Partner');

    }
    
    public function title(){

        return $this->belongsTo('App\Title');

    }

    public function group(){

        return $this->belongsTo('App\Group');

    }
}
