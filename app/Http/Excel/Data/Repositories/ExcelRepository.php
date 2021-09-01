<?php

namespace App\Http\Excel\Data\Repositories;

use App\Http\Excel\Data\Repositories\Contracts\IExcel;
use App\Http\Excel\Models\Row;
use App\Http\Repositories\Eloquent\BaseRepository;
use Illuminate\Support\Collection;

class ExcelRepository extends BaseRepository implements IExcel
{
    /**
     * @return string
     */
    public function model(): string
    {
        return Row::class;
    }

    /**
     * @return Collection
     */
    public function getAllGroupByDate(): Collection
    {
        return $this->model
            ->select('id', 'name', 'date')
            ->get()
            ->groupBy('date');
    }
}
