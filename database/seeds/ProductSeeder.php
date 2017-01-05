<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::statement('TRUNCATE TABLE products');
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $faker      = Faker\Factory::create('vi_VN');
        $categories = App\Entities\Category::all();
        $files      = collect(\File::allFiles(public_path('img')));
        foreach ($categories as $category => $indexCategory) {
            foreach (range(0, 200) as $indexOfProduct) {
                $product = \App\Entities\Product::create([
                            'name'        => $faker->name,
                            'description' => $faker->sentence,
                            'quanlity'    => 0,
                            'status'      => 1,
                            'category_id' => $category->id,
                ]);
                foreach (range(4, 7) as $indexofImage) {
                    $product->addMediaFromUrl($files->random())->toCollection('products');
                }
                echo 'Products ' . $indexOfProduct . PHP_EOL;
            }
        }
    }

}
