<?php

namespace App\Services;

use App\Models\Book;
use Illuminate\Database\Eloquent\Builder;

class BookService
{
    public function getSearchBuilder(
        ?string $searchText = null,
        ?int $authorId = null): Builder
    {
        $query = Book::with('author')->orderBy('title');

        if ($searchText) {
            $query->where(function ($q) use ($searchText) {
                $q->where('title', 'like', "%$searchText%");
                $q->orWhere('description', 'like', "%$searchText%");
            });
        }

        if ($authorId) {
            $query->where('author_id', $authorId);
        }

        return $query;
    }
}
