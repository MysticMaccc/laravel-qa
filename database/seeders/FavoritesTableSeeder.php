<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Question;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class FavoritesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('favorites')->delete();

        $users = User::pluck('id')->all();
        $numberOfUsers = count($users);

        foreach(Question::all() as $question){
                for($i = 0 ; $i < rand(0, $numberOfUsers) ; $i++){
                        $user = $users[$i];
                        $question->favorites()->attach($user);
                }
        }

    }
}
