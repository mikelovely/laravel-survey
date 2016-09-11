<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'survey_id',
        'slug',
        'title',
        'description',
        'order',
    ];

    protected $dates = ['deleted_at'];

    public function survey()
    {
    	return $this->belongsTo('App\Models\Survey');
    }

    public function questions()
    {
        return $this->hasMany('App\Models\Question')->whereNull('parent_question_id');
    }
}
