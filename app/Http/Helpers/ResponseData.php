<?php

namespace App\Http\Helpers;

class ResponseData
{
    /**
     * @param array $data
     * @param int $code
     * @param bool $status
     * @return object
     */
    public static function send(bool $status,  array $data = [], int $code = 200): object
    {
        return (object)[
            'data' => [
                'status' => $status,
                'data' => $data
            ],
            'code' => $code
        ];
    }
}
