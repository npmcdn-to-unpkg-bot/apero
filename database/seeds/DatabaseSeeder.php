<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $this->call(AdminsTableSeeder::class);
          $this->call(ZipCodesSeeder::class);
          $this->call(CountriesSeeder::class);
    }
}
