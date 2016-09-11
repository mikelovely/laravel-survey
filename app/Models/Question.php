<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'parent_question_id',
        'group_id',
        'title',
        'description',
        'type',
        'order',
        'mandatory',
    ];

    protected $dates = ['deleted_at'];

    public function group()
    {
        return $this->belongsTo('App\Models\Group');
    }

    public function answers()
    {
        return $this->hasMany('App\Models\Answer');
    }

    public function sub_questions()
    {
        return $this->hasMany('App\Models\Question', 'parent_question_id');
    }

    public function parent_question()
    {
        return $this->belongsTo('App\Models\Question', 'id');
    }
}
