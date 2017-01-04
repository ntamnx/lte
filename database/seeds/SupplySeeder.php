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
        \DB::statement('TRUNCATE TABLE categories');
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $faker = Faker\Factory::create('vi_VN');
        foreach (range(0, 20) as $index) {
            App\Entities\Category::create([
                'name'        => $faker->title,
                'description' => $faker->sentence,
            ]);
            echo 'Category ' . $index . PHP_EOL;
        }
    }

}
