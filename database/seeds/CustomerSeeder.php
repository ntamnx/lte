<?php

use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::statement('TRUNCATE TABLE customers');
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $faker = Faker\Factory::create('vi_VN');
        foreach (range(0, 200) as $index) {
            App\Entities\Customer::create([
                'name'    => $faker->title,
                'phone'   => $faker->phoneNumber,
                'address' => $faker->address,
            ]);
            echo 'Customer ' . $index . PHP_EOL;
        }
    }

}
