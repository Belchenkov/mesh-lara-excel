<?php

namespace App\Http\Excel\Data\Repositories\Contracts;

use App\Http\Repositories\Contracts\IBase;
use Illuminate\Support\Collection;

interface IExcel extends IBase
{
    /**
     * @return Collection
     */
    public function getAllGroupByDate(): Collection;
}
