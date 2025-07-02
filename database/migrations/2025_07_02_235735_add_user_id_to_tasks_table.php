<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            // まずNULL許容で追加
            $table->unsignedBigInteger('user_id')->nullable()->after('id');
        });

        // 既存レコードにuser_id=1をセット（管理者ID等に応じて変更可）
        DB::table('tasks')->update(['user_id' => 1]);

        Schema::table('tasks', function (Blueprint $table) {
            // NOT NULL制約と外部キー制約を追加
            $table->unsignedBigInteger('user_id')->nullable(false)->change();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
