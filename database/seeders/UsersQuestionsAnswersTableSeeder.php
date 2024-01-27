<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;

class UsersQuestionsAnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //delete old records
        DB::table('users')->delete();
        DB::table('questions')->delete();
        DB::table('answers')->delete();
        
        User::factory()->count(12)->create();
        Question::factory()->count(100)->create();
        Answer::factory()->count(100)->create();
    }
}
