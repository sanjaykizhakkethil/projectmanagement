<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_id',
        'task_name',
        'task_is_active',
        
    ];
    public function task()
    {
        return $this->belongsTo(Project::class,'project_id', 'id');
    }
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
