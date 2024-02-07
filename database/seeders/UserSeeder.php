<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['id'=>1,'name'=>'مأكولات','description'=>'أكل عربي','imagepath'=>'assets/img/burg1.jpg'],
            ['id'=>2,'name'=>'ساعات','description'=>'ساعات يد','imagepath'=>'assets/img/h1.jpg'],
            ['id'=>3,'name'=>'مكياج','description'=>'حامورة وماسكرة','imagepath'=>'assets/img/p2.jpg'],
            ['id'=>4,'name'=>'كاميرات','description'=>'كاميرات تصوير بدقة عالية','imagepath'=>'assets/img/canon1.jpg'],
        ];
        DB::table('categories')->InsertOrIgnore($categories);


        for($i=1; $i <= 25; $i++){
            Product::create([
                'name'=>'product'.$i,
                'description'=>'this is the firt product'.$i,
                'imagepath'=>'assets/img/pic3.png'.$i,
                'quantity'=>rand(1,100),
                'price' => rand(1,50),
                'category_id'=>rand(1,4),

            ]);
        }

    }
}
