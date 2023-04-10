<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shops = [
            [
                'category_name' => 'furniture',
//                'children' => [
//                    [
//                        'category_name' => 'Comic Book',
//                        'children' => [
//                            ['category_name' => 'Marvel Comic Book'],
//                            ['category_name' => 'DC Comic Book'],
//                            ['category_name' => 'Action comics'],
//                        ],
//                    ],
//                    [
//                        'category_name' => 'electronics',
//                        'children' => [
//                            ['category_name' => 'Business'],
//                            ['category_name' => 'Finance'],
//                            ['category_name' => 'Computer Science'],
//                        ],
//                    ],
//                ],
            ],
            [
                'category_name' => 'fashion',
            ],
            [
                'category_name' => 'fashion',
            ],
            [
                'category_name' => 'medicine',
            ],
            [
                'category_name' => 'cosmetic',
            ],
            [
                'category_name' => 'electronics',
//                'children' => [
//                    [
//                        'category_name' => 'TV',
//                        'children' => [
//                            ['category_name' => 'LED'],
//                            ['category_name' => 'Blu-ray'],
//                        ],
//                    ],
//                    [
//                        'category_name' => 'Mobile',
//                        'children' => [
//                            ['category_name' => 'Samsung'],
//                            ['category_name' => 'iPhone'],
//                            ['category_name' => 'Xiomi'],
//                        ],
//                    ],
//                ],
            ],
        ];
        foreach($shops as $shop)
        {
            Category::create($shop);
        }
    }
}
