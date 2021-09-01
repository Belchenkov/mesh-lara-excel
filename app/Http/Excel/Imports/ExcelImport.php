<?php

namespace App\Http\Excel\Imports;

use App\Http\Excel\Models\Row;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Redis;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class ExcelImport implements WithStartRow, ToCollection
{
    private CONST START_ROW = 2;
    private CONST LIMIT_ROWS = 1000;

    public function startRow(): int
    {
        return self::START_ROW;
    }

    public function collection(Collection $collection): bool | Collection
    {
        $redis = Redis::connection();
        $prev_count_rows = (int)$redis->get(config('excel')['redis_key']) ?: 0;

        if ($prev_count_rows >= $collection->count()) {
            return false;
        }

        $redis->set(config('excel')['redis_key'], $prev_count_rows + self::LIMIT_ROWS);

        return $collection
            ->skip($prev_count_rows)
            ->take(self::LIMIT_ROWS)
            ->each(function ($row) {
                return Row::create([
                    'name'     => $row[1],
                    'date'    => Date::excelToDateTimeObject($row[2])->format('d.m.Y'),
                ]);
        });
    }
}
