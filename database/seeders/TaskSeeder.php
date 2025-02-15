<?php

namespace Database\Seeders;

use App\Models\Board;
use App\Models\Task;
use App\Models\TaskAttachment;
use App\Models\TaskComment;
use App\Models\TaskLink;
use App\Models\TaskMember;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        for ($CatalogID = 0; $CatalogID < 100; $CatalogID++) {
            $access = \App\Enums\IndexEnum::getValues();
            $randomAccess = $access[array_rand($access)];
            Task::query()->create([
                'catalog_id' => $CatalogID,
                'title' => fake()->sentence(),
                'description' => fake()->paragraph(),
                'position' => fake()->numberBetween(1, 5),
                'image' => fake()->optional()->imageUrl(),
                'priority' => $randomAccess,
                'risk' => $randomAccess,
                'complete' => fake()->numberBetween(0, 100),
            ]);
        }
        for ($TaskID = 0; $TaskID < 100; $TaskID++) {
            for ($UserID = 0; $UserID < 10; $UserID++) {
                TaskMember::query()->create([
                    'task_id' =>$TaskID,
                    'user_id' =>$UserID,
                    'follow' => fake()->boolean(20),
                ]);
            }
        }
        for ($TaskID = 0; $TaskID < 100; $TaskID++) {
            for ($UserID = 0; $UserID < 10; $UserID++) {
                TaskComment::query()->create([
                    'task_id' =>$TaskID,
                    'user_id' =>$UserID,
                    'content' => fake()->paragraph(),
                    'image' => fake()->optional()->imageUrl(),
                    'parent_id' => null,
                ]);
            }
        }
       $data=TaskComment::query()->get();
        for ($TaskID = 0; $TaskID < 100; $TaskID++) {
            for ($UserID = 0; $UserID < 10; $UserID++) {
                TaskComment::query()->create([
                    'task_id' =>$TaskID,
                    'user_id' =>$UserID,
                    'content' => fake()->paragraph(),
                    'image' => fake()->optional()->imageUrl(),
                    'parent_id' =>  $data->random()->id,
                ]);
            }
        }
        for ($TaskID = 0; $TaskID < 100; $TaskID++) {
            for ($UserID = 0; $UserID < 10; $UserID++) {
                TaskAttachment::query()->create([
                    'task_id' =>$TaskID,
                    'user_id' =>$UserID,
                    'file_name' => fake()->word() . '.pdf',
                ]);
            }
        }
        for ($TaskID = 0; $TaskID < 100; $TaskID++){
            if (fake()->boolean()){
                TaskLink::query()->create([
                    'task_id' => $TaskID,
                    'linkable_id' => rand(1,10),
                    'linkable_type' => Board::class,
                ]);
            }else{
                TaskLink::query()->create([
                    'task_id' => $TaskID,
                    'linkable_id' => rand(1,10),
                    'linkable_type' => Task::class,
                ]);
            }
        }


    }
}
