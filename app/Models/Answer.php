<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Answer extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'question_id',
        'value',
        'code',
        'answer_text',
        'visable',
        'order',
    ];

    protected $dates = ['deleted_at'];

    public function question()
    {
        return $this->belongsTo('App\Models\Question');
    }
}
