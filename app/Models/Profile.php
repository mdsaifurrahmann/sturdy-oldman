<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'state',
        'zip',
        'designation',
        'address',
        'profile_image',
        'status',
    ];

    protected $table = 'profile';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
