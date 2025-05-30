<?php

namespace App\Enums;

enum UserRole: string
{
    case User = 'USER';
    case Todo = 'TODO';
    case BookAdmin = 'BOOK_ADMIN';
    case AuthorAdmin = 'AUTHOR_ADMIN';
}
