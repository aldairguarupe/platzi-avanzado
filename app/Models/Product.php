<?php

namespace App\Models;

use App\Utils\CanBeRated;
use Faker\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Product extends Model
{
    use HasFactory, CanBeRated;

    protected $fillable = ['name', 'price'];
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function createdBy ()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    protected static function booted()
    {
        // Evento antes de crear un producto
        static::creating(function (Product $product) {
            $faker = Factory::create();
            $product->image_url = $faker->imageUrl();
            $product->createdBy()->associate(auth()->user());
        });
        // Evento después de crear un producto
        static::created(function ($product) {
            // Lógica después de crear el producto
            Log::info('Producto creado exitosamente: ' . $product->id);
        });
    }
}
