<?php

namespace App\Http\Requests\Document;

use App\Http\Requests\ListRequest;
use Illuminate\Support\Facades\Auth;

class IndexDocumentRequest extends ListRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return [];
    }
}