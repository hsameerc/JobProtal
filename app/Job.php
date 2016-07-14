<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use SoftDeletes;
    protected $fillable = ['title', 'slug', 'description', 'user_email', 'skills', 'created_at'];
    protected $hidden = [
        'auth_id'
    ];


}
