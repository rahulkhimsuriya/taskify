<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;
    
    protected $guarded = [];

    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
