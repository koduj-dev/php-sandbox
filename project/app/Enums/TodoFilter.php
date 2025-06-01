<?php

namespace App\Enums;

enum TodoFilter: string
{
    case All = 'all';
    case Completed = 'completed';
    case Uncompleted = 'uncompleted';
}
