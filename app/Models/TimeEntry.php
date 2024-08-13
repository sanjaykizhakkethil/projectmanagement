<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'task_id',
        'hour',
        'date',
        'description',
        'is_active'
    ];
    public function entryproject()
    {
        return $this->belongsTo(Project::class,'project_id', 'id');
    }
    public function entrytask()
    {
        return $this->belongsTo(Task::class,'task_id', 'id');
    }
}
