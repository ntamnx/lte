<?php

use Illuminate\Database\Seeder;

class BillSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::statement('TRUNCATE TABLE bills');
        \DB::statement('TRUNCATE TABLE bill_detail');
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $faker     = Faker\Factory::create('vi_VN');
        $products  = \App\Entities\Product::all();
        $users     = \App\Entities\User::all();
        $customers = \App\Entities\Customer::all();
        foreach (range(0, 100) as $indexOfBill) {
            $bill = App\Entities\Bill::create([
                        'customer_id' => $customers->random()->id,
                        'user_id'     => $users->random()->id,
                        'status'      => 0,
                        'total_money' => $faker->numberBetween(100000, 900000),
            ]);
            foreach (range(10, 15) as $indexDetailBill) {
                \App\Entities\BillDetail::create([
                    'bill_id'    => $bill->id,
                    'product_id' => $products->random()->id,
                    'price'      => $faker->numberBetween(100000, 900000),
                    'quanlity'   => $faker->numberBetween(1, 10),
                    'status'     => 1,
                ]);
            }
            echo 'Bill ' . $indexOfBill . PHP_EOL;
        }
        echo "End bill".PHP_EOL;
    }

}
