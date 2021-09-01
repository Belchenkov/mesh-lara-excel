<?php

namespace App\Http\Excel\UI\API\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Excel\Actions\UploadAction;
use App\Http\Excel\UI\API\Requests\UploadRequest;
use Illuminate\Http\JsonResponse;

class ExcelController extends Controller
{
    /**
     * @param UploadRequest $request
     * @param UploadAction $action
     * @return JsonResponse
     */
    public function upload(UploadRequest $request, UploadAction $action): JsonResponse
    {
        $result = $action->run($request->validated());
        return response()->json($result->data, $result->code);
    }
}
