<?php

use Illuminate\Database\Seeder;

class ImportSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::statement('TRUNCATE TABLE imports');
        \DB::statement('TRUNCATE TABLE import_detail');
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $faker    = Faker\Factory::create('vi_VN');
        $products = \App\Entities\Product::all();
        $supplies = \App\Entities\Supply::all();
        $users    = \App\Entities\User::all();
        foreach (range(0, 100) as $indexImport) {
            $import = App\Entities\Import::create([
                        'suppliers_id' => $supplies->random()->id,
                        'user_id'      => $users->random()->id,
                        'status'       => 0,
                        'total_money'  => $faker->numberBetween(100000, 900000),
            ]);
            foreach (range(10, 15) as $indexDetailImport) {
                \App\Entities\ImportDetail::create([
                    'import_id'  => $import->id,
                    'product_id' => $products->random()->id,
                    'price'      => $faker->numberBetween(100000, 900000),
                    'quantity'   => $faker->numberBetween(1, 10),
                    'status'     => 0,
                ]);
            }
            echo 'Import ' . $indexImport . PHP_EOL;
        }
        echo "End Import" . PHP_EOL;
    }

}
