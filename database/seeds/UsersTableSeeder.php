<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	DB::table('users')->truncate();

    	DB::table('jobs')->truncate();

    	DB::table('role_user')->truncate();

    	DB::table('job_tag')->truncate();

    	DB::table('tag_user')->truncate();

        factory(App\User::class, 50)->create()->each(function($u) {
	        $u->jobs()->save(factory(App\Job::class)->make());
	        $u->jobs()->save(factory(App\Job::class)->make());
	        $u->jobs()->save(factory(App\Job::class)->make());
	    });

	    $users = App\User::all();

	    $tags = App\Tag::all();

	    $role = App\Role::where("name", "employer")->first();

	    foreach($users as $user) {

	    	$user->roles()->save($role);

			$jobs = $user->jobs()->get();

			foreach($jobs as $job) {

				for($i=1; $i<4;$i++) {
					$rand = rand(1, $tags->count());

					$job->tags()->attach($rand);
				}
			}

	    }
    }
}
