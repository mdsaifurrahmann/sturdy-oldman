<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrincipalModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'principal_name',
        'qop',
        'position',
        'institute',
        'pi',
        'pip',
        'description',
        'message',
    ];

    protected $table = 'principal';
}
