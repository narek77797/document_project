<?php

namespace App\Repositories\Read\Document;

use App\Models\Document;
use App\Services\Document\Dto\IndexDocumentDTO;
use Illuminate\Pagination\LengthAwarePaginator;

interface DocumentReadRepositoryInterface
{
    public function index(IndexDocumentDTO $dto, array $relations = []): LengthAwarePaginator;

    public function getById(string $id, array $relations = []): Document;
}