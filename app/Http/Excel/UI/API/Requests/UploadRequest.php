<?php

namespace App\Http\Excel\UI\API\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'file' => 'required|max:50000|mimetypes:application/csv,application/excel,'
                        . 'application/vnd.ms-excel, application/vnd.msexcel,'
                        . 'text/csv, text/anytext, text/plain, text/x-c,'
                        . 'text/comma-separated-values,'
                        . 'inode/x-empty,'
                        . 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
        ];
    }
}
