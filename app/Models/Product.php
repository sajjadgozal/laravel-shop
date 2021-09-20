<?php

namespace App\Models;

use App\Traits\CreatorOfModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, CreatorOfModelTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'price',
        'description',
        'inventory',
        'image_url',
        'category_id',
        'created_by_id',
    ];

    /**
     * Get the user that added the product.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
