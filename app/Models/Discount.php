<?php

namespace App\Models;

use App\Traits\CreatorOfModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory , CreatorOfModelTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'present',
        'description',
        'code',
        'user_id',
        'created_by_id',
    ];

}
