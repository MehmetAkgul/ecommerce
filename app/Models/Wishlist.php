<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\Return_;

class Wishlist extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
