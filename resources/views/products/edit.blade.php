@extends('layouts.app')
@section('title', 'Edit ' . $product->name)
@section('content')
    <div class="d-flex justify-content-center align-items-center mt-5">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('products.index') }}" class="btn btn-outline-primary float-end">Home</a>
            </div>
            <div class="card-body">
                <form action="{{ route('products.update', $product->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="d-flex justify-content-between gap-3">
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('Name') }}</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                   name="name" value="{{ $product->name }}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">{{ __('Price') }}</label>
                            <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                                   name="price" step="0.01" min="0" value="{{ $product->price }}">
                            @error('price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">{{ __('Description') }}</label>
                        <textarea name="description" id="description"
                                  class="form-control @error('description') is-invalid @enderror">{{ $product->description }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-warning">
                        {{ __('Update') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection