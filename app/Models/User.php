<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function departmentShifts()
    {
        return $this->hasMany(UserDepartmentShift::class);
    }

    public function createdDepartmentShifts()
    {
        return $this->hasMany(UserDepartmentShift::class, 'created_by');
    }

    public function updatedDepartmentShifts()
    {
        return $this->hasMany(UserDepartmentShift::class, 'updated_by');
    }

    public function canceledTickets()
    {
        return $this->hasMany(Ticket::class, 'canceled_by');
    }

    public function createdTickets()
    {
        return $this->hasMany(Ticket::class, 'created_by');
    }

    public function closedTickets()
    {
        return $this->hasMany(UserDepartmentShift::class, 'closed_by');
    }
}
