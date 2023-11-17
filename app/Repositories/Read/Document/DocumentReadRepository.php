<?php

namespace App\Repositories\Read\Document;

use App\Models\Document;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Services\Document\Dto\IndexDocumentDTO;
use App\Exceptions\Document\DocumentNotFoundException;

class DocumentReadRepository implements DocumentReadRepositoryInterface
{
    public function query(): Builder
    {
        return Document::query();
    }

    public function index(IndexDocumentDTO $dto, array $relations = []): LengthAwarePaginator
    {
        $query = $this->query();

        $query->with($relations);

        if ($dto->q) {
            $query->where(function (Builder $query) use ($dto) {
                $query->where('title', 'like', "%$dto->q%");
            });
        }

        foreach ($this->sorts ?? [] as $sort) {
            $query->orderBy($sort['value'], $sort['key']);
        }

        return $query->paginate(
            $dto->pagination->perPage,
            ['*'],
            'page',
            $dto->pagination->page
        );
    }

    /**
     * @throws DocumentNotFoundException
     */
    public function getById(string $id, array $relations = []): Document
    {
        $document = $this->query()
            ->where('id', $id)
            ->with($relations)
            ->first();

        if (is_null($document)) {
            throw new DocumentNotFoundException();
        }

        return $document;
    }
}