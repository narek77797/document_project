<?php

namespace App\Http\Controllers\Document;

use App\Http\Controllers\Controller;
use App\Services\Document\Dto\ShowDocumentDTO;
use App\Services\Document\Dto\IndexDocumentDTO;
use App\Http\Requests\Document\ShowDocumentRequest;
use App\Http\Requests\Document\IndexDocumentRequest;
use App\Services\Document\Actions\ShowDocumentAction;
use App\Http\Resources\Document\IndexDocumentResource;
use App\Services\Document\Actions\IndexDocumentAction;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class DocumentController extends Controller
{
    /**
     * @throws UnknownProperties
     */
    public function index(
        IndexDocumentRequest $request,
        IndexDocumentAction $indexDocumentAction
    ): AnonymousResourceCollection {
        $dto = IndexDocumentDTO::fromRequest($request);

        $result = $indexDocumentAction->run($dto);

        return IndexDocumentResource::collection($result);
    }

    /**
     * @throws UnknownProperties
     */
    public function show(
        ShowDocumentRequest $request,
        ShowDocumentAction $showDocumentAction
    ): IndexDocumentResource {
        $dto = ShowDocumentDTO::fromRequest($request);

        $result = $showDocumentAction->run($dto);

        return new IndexDocumentResource($result);
    }
}