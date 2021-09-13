<?php
namespace App\Traits;

trait CreatorOfModelTrait {
    public static function bootCreatorOfModelTrait() {
        static::creating(function ($model) {
            $model->created_by_id = auth()->id();
        });
    }
}