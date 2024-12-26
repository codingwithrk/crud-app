@extends('layouts.app')
@section('title', 'Add new product')
@section('content')
    <div class="d-flex justify-content-center align-items-center mt-5">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('products.index') }}" class="btn btn-outline-primary float-end">Home</a>
            </div>
            <div class="card-body">
                <form action="{{ route('products.store') }}" method="POST">
                    @csrf
                    <div class="d-flex justify-content-between gap-3">
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('Name') }}</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                   name="name">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">{{ __('Price') }}</label>
                            <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                                   name="price" step="0.01" min="0">
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
                                  class="form-control @error('description') is-invalid @enderror"></textarea>
                        @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">
                        {{ __('Save') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection