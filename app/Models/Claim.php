<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'employee', 'department', 'category', 'value', 'description', 'filepath', 'status', 'comment'
    ];
}
