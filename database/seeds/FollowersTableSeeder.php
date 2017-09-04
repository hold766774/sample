<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class FollowersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users=User::all();
        $user=$users->first();
        $user_id=$user->id;

        $followers=$users->slice(1);
        $follower_id=$followers->pluck('id')->toArray();

        //关注除了1号之外的所有用户
        $user->follow($follower_id);

        //除了1号用户意外的所有用户都来关注1号用户
        foreach ($followers as $follower)
        {
            $follower->follow($user_id);
        }
    }
}
