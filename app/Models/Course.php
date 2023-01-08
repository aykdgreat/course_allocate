<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    
    protected $table = 'courses';

    protected $fillable = ['code', 'title', 'level', 'units', 'semester', 'students'];

    public function users() {
        return $this->belongsToMany(User::class, 'assigned');
    }
}
