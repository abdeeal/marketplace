<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
          'name' => 'Galaxy Tab S8 Ultra 5G',
          'merk' => 'Samsung',
          'from' => 'Seoul, Korea Selatan',
          'rating' => '4.71',
          'price' => '19999000',
          'description' => 'Tersedia dalam tiga model berbeda. Galaxy Tab S8 memiliki layar LCD 11", sedangkan Galaxy Tab S8+ memiliki layar sAMOLED 12,4" yang lebih besar. Galaxy Tab S8 Ultra menetapkan standar epik baru untuk tablet dengan layar sAMOLED 14,6".',
          'categories' =>'tablet'
        ]);
    }
}
