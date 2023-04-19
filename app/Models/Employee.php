<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'Employees';
    protected $primaryKey = 'id';
    protected $fillable = ['first_name', 'last_name', 'address', 'mobile'];  
 
    use HasFactory;
}
