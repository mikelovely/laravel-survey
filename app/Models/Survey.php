<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Survey extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'slug',
        'title',
        'description',
        'welcome_text',
        'end_text',
        'end_url',
        'admin_name',
        'admin_email',
        'allow_registration',
        'active',
        'anonymized',
        'starts_at',
        'expires_at',
    ];

    protected $dates = ['deleted_at'];

    public function groups()
    {
        return $this->hasMany('App\Models\Group');
    }

    public function questions()
    {
        return $this->hasManyThrough('App\Models\Question', 'App\Models\Group');
    }
}
