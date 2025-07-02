<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $user = \App\Models\User::updateOrCreate(
            [ 'email' => 'test@test.com' ],
            [
                'name' => 'テストユーザ',
                'password' => bcrypt('password'),
            ]
        );

        // タスクを10件作成
        for ($i = 1; $i <= 10; $i++) {
            \App\Models\Task::updateOrCreate(
                [ 'user_id' => $user->id, 'content' => "サンプルタスク{$i}" ],
                [ 'status' => '未着手' ]
            );
        }
    }
}
