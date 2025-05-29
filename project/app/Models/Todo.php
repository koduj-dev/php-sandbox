<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'completed_at'
    ];

    protected $casts = [
        'completed_at' => 'date'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
