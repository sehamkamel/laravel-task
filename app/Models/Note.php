<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // ضيفي هذا السطر

class Note extends Model
{
    use HasFactory, SoftDeletes;  // ضيفي SoftDeletes هنا

    protected $fillable = [
        'title',
        'content',
    ];

    protected $dates = ['deleted_at']; // ضيفي هذه الخاصية أيضاً
}
