<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    //to make password hidden when extracting data from db
    protected $hidden=["password","user_token","verify_code","api_token"];

}
