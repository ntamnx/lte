<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder {

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
        foreach (range(0, 5) as $index) {
            App\Entities\Category::create([
                'name'        => $faker->unique()->name,
                'description' => $faker->sentence,
            ]);
            echo 'Category ' . $index . PHP_EOL;
        }
        echo "End category" . PHP_EOL;
    }

}
