<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['user_id', 'content', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
