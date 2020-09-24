<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class Child extends Model
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
    
    public function guardian()
    {
        return $this->belongsTo('App\Guardian');
    }

}
