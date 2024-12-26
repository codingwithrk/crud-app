<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Product::select('name', 'price', 'description')->latest()->get()->map(function ($product) {
            return [
                'name' => $product->name,
                'price' => $product->price,
                'description' => $product->description,
            ];
        });
    }

    /**
     * Define the headers for the export.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'Name',
            'Price',
            'Description',
        ];
    }
}
