<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HumanResource extends Model
{
    use HasFactory;
    protected $fillable=[
        'fname', 'mname', 'lname','mobile','ministry','pay','occupation','gender',
        'birthday', 'marital','address','email','status','registrationdate'
    ];
}
