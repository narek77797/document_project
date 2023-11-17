<?php

namespace App\Services\Document\Actions;

use App\Models\Document;
use App\Services\Document\Dto\ShowDocumentDTO;
use App\Repositories\Read\Document\DocumentReadRepositoryInterface;

class ShowDocumentAction
{
    public function __construct(private readonly DocumentReadRepositoryInterface $documentReadRepository)
    {
    }

    public function run(ShowDocumentDTO $dto): Document
    {
        return $this->documentReadRepository->getById($dto->id);
    }
}