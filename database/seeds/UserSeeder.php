<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::statement("TRUNCATE TABLE users");
        App\Entities\User::create([
            'name'     => 'Nguyễn Xuân Tâm',
            'email'    => 'user@gmail.com',
            'password' => bcrypt('111111'),
            'role_id'     => 1,
            'active'   => 1,
        ]);
        echo "End User";
    }

}
