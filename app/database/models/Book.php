<?php

namespace App\Database\Models;

class Book
{
    public const TABLE = 'books';
    public const COLUMNS = [
        'id' => 'id',
        'name' => 'name',
        'amount' => 'borrowers',
        'genre' => 'genre',
        'createdTime' => 'created_at',
        'updatedTime' => 'updated_at'
    ];
}
