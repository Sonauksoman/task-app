<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Task;

class Category extends Model
{
    use HasFactory;
    
    public function tasks()
    {
        return $this->hasMany(Task::class, 'category_id');
    }
}
