@extends('layouts.app')
@section('title', $product->name . ' Details')
@section('content')
    <div class="d-flex justify-content-center align-items-center mt-5">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('products.index') }}" class="btn btn-outline-primary float-end">Home</a>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between gap-3">
                    <div class="mb-3">
                        <label for="name" class="form-label">{{ __('Name') }}</label>
                        <input type="text" class="form-control" id="name" readonly value="{{ $product->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="form-label">{{ __('Slug') }}</label>
                        <input type="text" class="form-control" id="slug" readonly value="{{ $product->slug }}">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">{{ __('Price') }}</label>
                        <input type="number" class="form-control" id="price" readonly value="{{ $product->price }}">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">{{ __('Description') }}</label>
                    <textarea id="description" class="form-control" readonly>{{ $product->description }}</textarea>
                </div>
                <div class="d-flex justify-content-between">
                    <x-edit-btn :id="$product->id"/>
                    <x-delete-btn :id="$product->id"/>
                </div>
            </div>
        </div>
    </div>
@endsection