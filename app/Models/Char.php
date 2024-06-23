<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Char extends Model
{
    use HasFactory;
    public const CLASSES = [
        [
            "class" => "0",
            "img" => "images/poslushik.png",
            "name" => "Thiếu Hiệp"
        ],
        [
            "class" => "117,118,119,120,121",
            "img" => "images/skayaV.png",
            "name" => "Phá Quân"
        ],
        [
            "class" => "108,109,110,111,112",
            "img" => "images/skayaV.png",
            "name" => "Anh Chiêu"
        ],
        [
            "class" => "77,78,79,80,81",
            "img" => "images/skayaV.png",
            "name" => "Quy Vân"
        ],
        [
            "class" => "83,84,85,86,87",
            "img" => "images/skayaV.png",
            "name" => "Họa Ảnh"
        ],
        [
            "class" => "102,103,104,105,106",
            "img" => "images/skayaII.png",
            "name" => "Khiên Cơ"
        ],
        [
            "class" => "71,72,73,74,75",
            "img" => "images/skayaII.png",
            "name" => "Thanh La"
        ],
        [
            "class" => "56,57,58,59,60",
            "img" => "images/skayaII.png",
            "name" => "Thần Hoàng"
        ],
        [
            "class" => "51,52,53,54,55",
            "img" => "images/skayaII.png",
            "name" => "Thiên Hoa"
        ],
        [
            "class" => "33,34,35,36,37",
            "img" => "images/skayaII.png",
            "name" => "Cửu Lê"
        ],
        [
            "class" => "96,97,98,99,100",
            "img" => "images/skayaII.png",
            "name" => "Thái Hạo"
        ],
        [
            "class" => "45,46,47,48,49",
            "img" => "images/skayaII.png",
            "name" => "Hoài Quang"
        ],
        [
            "class" => "39,40,41,42,43",
            "img" => "images/skayaII.png",
            "name" => "Liệt Sơn"
        ],
        [
            "class" => "64,65,66,67,68",
            "img" => "images/skayaII.png",
            "name" => "Phần Hương Cốc"
        ],
        [
            "class" => "7,8,9,19,20",
            "img" => "images/skayaII.png",
            "name" => "Thanh Vân Môn"
        ],
        [
            "class" => "10,11,12,22,23",
            "img" => "images/skayaII.png",
            "name" => "Thiên Âm Tự"
        ],
        [
            "class" => "4,5,6,16,17",
            "img" => "images/skayaII.png",
            "name" => "Hợp Hoan Phái"
        ],
        [
            "class" => "1,2,3,13",
            "img" => "images/skayaII.png",
            "name" => "Quỷ Vương Tông"
        ],
        [
            "class" => "26,27,28,29",
            "img" => "images/skayaII.png",
            "name" => "Quỷ Đạo"
        ]
    ];

    public function getClass() {
        $item = collect(self::CLASSES)->first(function ($value, int $key) {
            return in_array($this->class, explode(",",$value["class"]));
        });
        return $item ? $item["name"] : "Chưa cập nhật";
    }

    public function getImage() {
        return url('') . "/assets/new/" . $item["img"];
    }

    public function getName() {
        return $this->name2 ?? $this->name;
    }
}
