<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;
Use DB;
class Department extends Model
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

    public static function get_the_first(){

        $the_first = DB::table('departments')->latest('id')->first();

        if ( $the_first != NULL ) {

            $the_first = $the_first->id;

        }
        return $the_first;
    }
    public function users(){

        return $this->hasMany('App\User');

    }
}
