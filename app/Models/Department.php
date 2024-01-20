<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    public function departmentShifts()
    {
        return $this->hasMany(UserDepartmentShift::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_departments','category_id');
    }
}