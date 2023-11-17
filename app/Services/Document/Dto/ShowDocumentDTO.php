<?php

namespace App\Services\Document\Dto;

use Spatie\DataTransferObject\DataTransferObject;
use App\Http\Requests\Document\ShowDocumentRequest;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class ShowDocumentDTO extends DataTransferObject
{
    public string $id;

    /**
     * @throws UnknownProperties
     */
    public static function fromRequest(ShowDocumentRequest $request): ShowDocumentDTO
    {
        return new self(
            id: $request->getId()
        );
    }
}