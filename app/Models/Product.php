<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasUuids;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
    ];

    /**
     * Get all products sorted by latest.
     */
    public static function allProducts()
    {
        return self::latest()->get();
    }

    /**
     * Save a new product.
     *
     * @param $request
     * @return Product
     */
    public static function saveData($request)
    {
        $data = $request;
        $data['slug'] = Str::slug($data['name']);

        return self::create($data);
    }

    /**
     * Update an existing product.
     *
     * @param $request
     * @param string $id
     * @return Product
     */
    public static function updateData($request, string $id)
    {
        $data = $request;
        $data['slug'] = Str::slug($data['name']);

        $model = self::findOrFail($id);
        $model->update($data);

        return $model;
    }

    /**
     * Delete an existing product.
     *
     * @param string $id
     * @return bool
     */
    public static function deleteData(string $id)
    {
        $model = self::findOrFail($id);
        return $model->delete();
    }
}
