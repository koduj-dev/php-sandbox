<?php

namespace App\Services;

use App\Models\Author;
use Illuminate\Support\Collection;

class AuthorService
{
    public function getGenres(): Collection
    {
        return Author::select('primary_genre')
            ->distinct()
            ->orderBy('primary_genre')
            ->get()
            ->pluck('primary_genre');
    }
}
