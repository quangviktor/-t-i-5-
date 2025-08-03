<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TuVan extends Model
{
    use HasFactory;

    protected $table = 'tu_vans'; // Tên bảng trong database (theo Laravel convention)

    // Các cột cho phép insert/update
    protected $fillable = [
        'noi_dung', 'email', 'thoi_gian' // cập nhật theo đúng tên cột bạn có
    ];
}
