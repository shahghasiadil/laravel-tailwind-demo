<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];
// Category.php

    public function departments()
    {
        return $this->belongsToMany(Department::class, 'category_departments', 'category_id', 'department_id');
    }

    public function tickets()
    {
        return $this->belongsToMany(Ticket::class, 'ticket_categories', 'ticket_id');
    }

}
