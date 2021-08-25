<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    // For mass assignment
    protected $guarded = ['id'];

    // Relationship to companies table
    public function company(){
    	return $this->belongsTo(Company::class);
    }
}
