<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $giftcodes = [
            [
                "giftcode" => "FCFB",
                "award" => "100KNB Hồng lợi",
                "itemid" => "10002",
                "expired" => "2024-06-23 00:00:00",
                "count" => 0,
                "quantity" => 0,
                "user_id" => 1,
                "status" => "active"
            ],
            [
                "giftcode" => "OPENBETA",
                "award" => "10 KTTN cấp 10, Pháp bảo Phệ Hồn",
                "itemid" => "10001",
                "expired" => "2024-06-25 00:00:00",
                "count" => 0,
                "quantity" => 0,
                "user_id" => 1,
                "status" => "active"
            ]
        ];

        \App\Models\Giftcode::insert($giftcodes);

        $shops = [
            [
                  "name" => "Thương Tâm Hoa", 
                  "description" => "Pháp Bảo Thương Tâm Hoa", 
                  "itemid" => "98999", 
                  "price" => 30, 
                  "stack" => 1, 
                  "status" => "active"
            ], 
            [
                "name" => "Quy Nguyên Thánh Ngọc", 
                "description" => "Mỗi lần dùng tăng 50 vạn điểm đạo thai nguyên anh", 
                "itemid" => "19991", 
                "price" => 50, 
                "stack" => 99, 
                "status" => "active"
            ],
            [
                "name" => "Vật phẩm 1", 
                "description" => "Mỗi lần dùng tăng 50 vạn điểm đạo thai nguyên anh", 
                "itemid" => "19991", 
                "price" => 50, 
                "stack" => 99, 
                "status" => "active"
            ] ,
            [
                "name" => "Vật phẩm 2", 
                "description" => "Mỗi lần dùng tăng 50 vạn điểm đạo thai nguyên anh", 
                "itemid" => "19991", 
                "price" => 50, 
                "stack" => 99, 
                "status" => "active"
            ] ,
            [
                "name" => "Vật phẩm 3", 
                "description" => "Mỗi lần dùng tăng 50 vạn điểm đạo thai nguyên anh", 
                "itemid" => "19991", 
                "price" => 50, 
                "stack" => 99, 
                "status" => "active"
            ] ,
            [
                "name" => "Vật phẩm 4", 
                "description" => "Mỗi lần dùng tăng 50 vạn điểm đạo thai nguyên anh", 
                "itemid" => "19991", 
                "price" => 50, 
                "stack" => 99, 
                "status" => "active"
            ] ,
            [
                "name" => "Vật phẩm 5", 
                "description" => "Mỗi lần dùng tăng 50 vạn điểm đạo thai nguyên anh", 
                "itemid" => "19991", 
                "price" => 50, 
                "stack" => 99, 
                "status" => "active"
            ] 
        ];
        \App\Models\Shop::insert($shops);
    }
}
