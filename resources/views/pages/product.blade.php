@extends('layout')

@section('title', $product->name)

@section('extra-css')

@endsection

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <a href="/">首頁</a>
            <i class="fa fa-chevron-right breadcrumb-separator"></i>
            <a href="{{ route('shop.index') }}">商店</a>
            <i class="fa fa-chevron-right breadcrumb-separator"></i>
            <span>{{ $product->slug }}</span>
        </div>
    </div> <!-- end breadcrumbs -->

    <div class="product-section container">
        <div class="product-section-image">
            <img src="{{ asset('img/products/'.$product->slug.'.jpg') }}" alt="product">
        </div>
        <div class="product-section-information">
            <h1 class="product-section-title">{{ $product->name }}</h1>
            <div class="product-section-subtitle">{{ $product->detail }}</div>
            <div class="product-section-price">{{ $product->price }}</div>
            <p>
                {{ $product->description }}
            </p>

            <form action="{{ route('cart.store') }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $product->id }}">
                <input type="hidden" name="name" value="{{ $product->name }}">
                <input type="hidden" name="price" value="{{ $product->price }}">
                <button type="submit" class="button button-plain">放入購物車</button>
            </form>
        </div>
    </div> <!-- end product-section -->
    
    @include('partials.might-like')
    
@endsection