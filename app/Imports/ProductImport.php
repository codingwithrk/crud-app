<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;


class ProductImport implements ToModel
{
    protected bool $isFirstRow = true;

    /**
     * @param array $row
     *
     * @return Model|null
     */
    public function model(array $row)
    {
        if ($this->isFirstRow) {
            $this->isFirstRow = false;
            return null;
        }
        return new Product([
            'name' => $row[0],
            'slug' => Str::slug($row[0]),
            'price' => $row[1],
            'description' => $row[2],
        ]);
    }
}
