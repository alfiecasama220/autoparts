<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    public function category() {
        return $this->belongsTo(Category::class);
    }

    protected $table = "inventory";

    // protected $fillable = [
    //     'name',
    //     'description',
    //     'category',
    //     'quantity',
    //     'price',
    //     'specification',
    //     'image',
    // ];
}
