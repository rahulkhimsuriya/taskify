<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    protected $touches = ['project'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'deleted_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'project_id' => 'integer'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function isCompleted()
    {
        return !! $this->completed;
    }

    public function complete()
    {
        return $this->update(['completed' => \Carbon\Carbon::now()]);
    }

    public function incomplete()
    {
        return $this->update(['completed' => '']);
    }
}
