<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class Student extends Model
{
    use HasFactory, HasApiTokens;

    protected $fillable = [
        'name',
        'email',
        'address',
        'study_course',
    ];
}
