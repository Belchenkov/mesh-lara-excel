<?php

namespace App\Http\Excel\Actions;

use App\Http\Excel\Data\Repositories\Contracts\IExcel;
use App\Http\Helpers\ResponseData;
use Illuminate\Http\Response;

class GetAllRowsAction
{
    /**
     * @var IExcel
     */
    protected IExcel $repository;

    /**
     * @param IExcel $repository
     */
    public function __construct(IExcel $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return object
     */
    public function run(): object
    {
        try {
            $rows = $this->repository->getAllGroupByDate();

            return ResponseData::send(
                true,
                ['rows' => $rows],
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
