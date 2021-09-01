<?php

namespace App\Console\Commands;

use App\Http\Excel\Jobs\ParseExcelJob;
use Illuminate\Console\Command;

class ParseExcel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse:excel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse Excel File';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {
        $file = storage_path('app/excel/test.xlsx');

        if (file_exists($file)) {
            ParseExcelJob::dispatch();
        } else {
            $this->error('File is Not Exists');
        }
    }
}
