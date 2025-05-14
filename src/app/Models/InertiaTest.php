<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InertiaTest extends Model
{
    // 一括代入を許可するカラムを指定（create() を使うために必要）
    protected $fillable = [
        'title',
        'content',
    ];
}
