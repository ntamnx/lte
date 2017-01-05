<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(SupplySeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(BillSeeder::class);
        $this->call(ImportSeeder::class);
    }

}
