@extends('layouts.app')
@section('title', 'Products')
@section('content')
    <div class="card my-5">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h1>Products</h1>
                <div class="d-flex justify-content-between align-items-center gap-3">
                    <a class="btn btn-success" href="{{ route('products.create') }}" role="button">Create New Item</a>
                    @if(count($products) > 0)
                        <a href="{{ route('products.export') }}" class="btn btn-success">Export Products</a>
                    @endif
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped text-center align-middle">
                    <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($products) > 0)
                        @foreach($products as $key => $value)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->price }}</td>
                                <td class="d-flex justify-content-center gap-3">
                                    <a class="btn btn-info" role="button"
                                       href="{{ route('products.show', $value->id) }}">
                                        Show
                                    </a>

                                    <x-edit-btn :id="$value->id"/>

                                    <x-delete-btn :id="$value->id"/>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="4">No Data found</th>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <form action="{{ route('products.import') }}" method="POST" enctype="multipart/form-data"
                  class="d-flex justify-content-center align-items-center gap-3">
                @csrf
                <div class="form-group">
                    <label for="file">Import Products (Excel or CSV)</label>
                    <input type="file" name="file" class="form-control" id="file" required>
                </div>
                <button type="submit" class="btn btn-info mt-3">Import</button>
            </form>
        </div>
    </div>
@endsection