<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'projectname',
        'project_is_active',
        
    ];
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
   
}
