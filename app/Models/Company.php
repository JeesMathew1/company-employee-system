<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'logo',
        'contact_number',
        'annual_turnover',
        'created_by',
        'updated_by'
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}

