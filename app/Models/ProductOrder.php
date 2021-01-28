<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class ProductOrder extends Model
{
    use HasFactory;
    protected $fillable=['user_id','product_id','qty'];

    public function user(){
       return $this->belongsTo(User::class);
    }

    public Function product(){
        return $this->belongsTo(Product::class);
    }
}
