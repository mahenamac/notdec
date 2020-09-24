<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class Guardian extends Model
{
    public $incrementing = false;

    protected $guarded = [];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {

            $model->id = (string) Uuid::generate();

        });

    }
    public function children()
    {
        return $this->hasMany('App\Child');
    }
}
