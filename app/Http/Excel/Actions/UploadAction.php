<?php

namespace App\Http\Excel\Actions;

use App\Http\Helpers\ResponseData;
use Illuminate\Http\Response;

class UploadAction
{
    /**
     * @param array $data
     * @return object
     */
    public function run(array $data): object
    {
        try {
            $file = $data['file']->storeAs('excel', 'test.xlsx');

            return ResponseData::send(
                true,
                ['file' => $file],
                Response::HTTP_OK
            );
        } catch (\Exception $e) {
            return ResponseData::send(
                false,
                ['error' => $e->getMessage()],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }
}
