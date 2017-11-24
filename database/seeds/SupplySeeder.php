<?php

use Illuminate\Database\Seeder;

class SupplySeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::statement('TRUNCATE TABLE supplies');
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $faker = Faker\Factory::create('vi_VN');
        foreach (range(0, 50) as $index) {
            App\Entities\Supply::create([
                'name'    => $faker->unique()->name,
                'phone'   => $faker->phoneNumber,
                'address' => $faker->address,
            ]);
            echo 'Supply ' . $index . PHP_EOL;
        }
         echo "End Supply".PHP_EOL;
    }

}
