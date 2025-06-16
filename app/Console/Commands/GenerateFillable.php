<?php

namespace App\Console\Commands;
use Illuminate\Support\Facades\Schema;

use Illuminate\Console\Command;

class GenerateFillable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-fillable {table}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '指定したテーブルのカラムから $fillable を生成';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $table = $this->argument('table');

        if (!Schema::hasTable($table)) {
            $this->error("テーブル [$table] は存在しません。");
            return;
        }

        $columns = Schema::getColumnListing($table);

        // 除外するカラム
        $ignore = ['id', 'created_at', 'updated_at', 'deleted_at'];

        $fillable = array_filter($columns, fn($col) => !in_array($col, $ignore));

        $output = "protected \$fillable = [\n    '" . implode("',\n    '", $fillable) . "'\n];";

        $this->info("=== $table モデル用 fillable ===");
        $this->line($output);
    }
}
