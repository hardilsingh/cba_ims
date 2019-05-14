<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Enrollment extends Model
{
    //
    protected $fillable = [

        'course_id',
        'batch_id',
        'name',
        'father_name',
        'address',
        'tel_no',
        'gender',
        'email',
        'edu',
        'school_name',
        'refer_mode',
        'reg_no',
        'date_join',
    ];

    use Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
                'onUpdate'=> true,
            ]
        ];
    }

    public function course()
    {
        return $this->belongsTo('App\Course');
    }

    public function batch()
    {
        return $this->belongsTo('App\Batch');
    }


    public function feemanager_id()
    {
        return $this->hasOne('App\FeeManager');
    }
}
