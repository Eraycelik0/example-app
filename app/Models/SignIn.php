<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use mysql_xdevapi\Table;

class SignIn extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'sign_in';

    protected $fillable = [
        'name', 'surname', 'email', 'image'
    ];
}
