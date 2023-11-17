<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Database\Factories\Document\DocumentFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Document extends Model
{
    use HasFactory;

    protected $table = 'documents';

    protected $fillable = [
        'id',
        'name'
    ];

    public static function newFactory(): DocumentFactory
    {
        return new DocumentFactory();
    }
}
