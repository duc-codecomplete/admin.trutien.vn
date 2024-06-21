<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
    use HasFactory;


    public function receive() {
        return $this->belongsTo(User::class, 'receiver', 'id');
    }

    public function sender() {
        return $this->belongsTo(User::class, 'send_by', 'id');
    }
}
