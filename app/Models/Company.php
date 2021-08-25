<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Company extends Model
{
    use HasFactory;
    // For Mass assignment
    protected $guarded = ['id'];
    // Relationship to employees table
    public function employees(){
    	return $this->hasMany(Employee::class);
    }
}
