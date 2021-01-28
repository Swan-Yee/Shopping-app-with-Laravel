<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductCart;
use App\Models\ProductOrder;
use App\Models\ProductSave;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'role'=>'Admin',
            'name'=>'Admin',
            'email'=>'admin@gmail.com',
            'image'=>'image/default.png',
            'password'=>Hash::make('password')
        ]);
        User::create([
            'role'=>'User',
            'name'=>'User',
            'email'=>'user@gmail.com',
            'image'=>'image/default.png',
            'password'=>Hash::make('password')
        ]);
        Category::factory(5)->create();
        Product::factory(30)->create();
        ProductCart::factory(1)->create();
        ProductSave::factory(10)->create();
        ProductOrder::factory(10)->create();
    }
}
