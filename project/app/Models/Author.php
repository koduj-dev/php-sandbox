<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Author extends Model
{
    /** @use HasFactory<\Database\Factories\AuthorFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'born_at',
        'died_at',
        'bio',
        'photo_url',
        'primary_genre'
    ];

    protected function casts(): array {
        return [
            'born_at' => 'date',
            'died_at' => 'date'
        ];
    }

    public function age(): string {
        return floor($this->born_at->diffInYears(
            $this->died_at ?? now()
        ));
    }

    public function books(): HasMany {
        return $this->hasMany(Book::class);
    }
}
