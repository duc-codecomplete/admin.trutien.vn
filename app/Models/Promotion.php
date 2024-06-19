<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    public function getType() {
        return $this->type == "double" ? "Tỉ Lệ" : "Phần Trăm";
    }
}
