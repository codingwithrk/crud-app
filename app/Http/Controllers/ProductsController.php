<?php

namespace App\Http\Controllers;

use App\Exports\ProductExport;
use App\Imports\ProductImport;
use App\Models\Product;
use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Writer\Exception;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::allProducts();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|min:0|max:9999999.99',
            'description' => 'required',
        ]);

        $saved = Product::saveData($validated);
        if ($saved) {
            return redirect()->route('products.index')->with('success', 'Product created successfully');
        }
        return redirect()->back()->with('error', 'Something went wrong');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|min:0|max:9999999.99',
            'description' => 'required',
        ]);
        $updated = Product::updateData($validated, $id);

        if ($updated) {
            return redirect()->route('products.index')->with('success', 'Product updated successfully');
        }
        return redirect()->back()->with('error', 'Something went wrong');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleted = Product::deleteData($id);
        if ($deleted) {
            return redirect()->route('products.index')->with('success', 'Product updated successfully');
        }
        return redirect()->back()->with('error', 'Something went wrong');
    }


    /**
     * Export products to Excel.
     */
    public function export()
    {
        return Excel::download(new ProductExport, 'products.csv');
    }

    /**
     * Import products from an Excel file.
     */
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv|max:2048',
        ]);

        Excel::import(new ProductImport, $request->file('file'));

        return redirect()->route('products.index')->with('success', 'Products imported successfully');
    }
}
