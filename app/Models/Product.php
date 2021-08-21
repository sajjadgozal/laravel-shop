<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'price',
        'description',
        'inventory',
        'category_id',
    ];

    /**
     * Get the user that added the product.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
