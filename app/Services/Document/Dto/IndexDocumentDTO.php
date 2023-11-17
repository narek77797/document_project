<?php

namespace App\Services\Document\Dto;

use App\Services\Dto\PaginationParamsDto;
use Spatie\DataTransferObject\DataTransferObject;
use App\Http\Requests\Document\IndexDocumentRequest;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class IndexDocumentDTO extends DataTransferObject
{
    public ?string $q;
    public ?array $sorts;
    public PaginationParamsDto $pagination;

    /**
     * @throws UnknownProperties
     */
    public static function fromRequest(IndexDocumentRequest $request): IndexDocumentDTO
    {
        return new self(
            q: $request->getQ(),
            sorts: $request->getSort(),
            pagination: new PaginationParamsDto(
                page: $request->getPage(),
                perPage: $request->getPerPage(),
            ),
        );
    }
}