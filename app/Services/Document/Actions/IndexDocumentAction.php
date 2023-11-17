<?php

namespace App\Services\Document\Actions;

use App\Services\Document\Dto\IndexDocumentDTO;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Repositories\Read\Document\DocumentReadRepositoryInterface;

class IndexDocumentAction
{
    public function __construct(private readonly DocumentReadRepositoryInterface $documentReadRepository)
    {
    }

    public function run(IndexDocumentDTO $dto): LengthAwarePaginator
    {
        return $this->documentReadRepository->index($dto);
    }
}