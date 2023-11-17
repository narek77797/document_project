<?php

namespace Database\Seeders\Document;

use App\Models\Document;
use Illuminate\Database\Seeder;

class DocumentSeed extends Seeder
{
    public function run(): void
    {
        Document::factory(700)->create();
    }
}