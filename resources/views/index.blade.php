@extends('layout.app')
@section('title','Nombre')
@section('main')
    @if (session('update') || session('create') || session('logout') || session('login'))
        <div class="div--success">
            {{ session('update') }}
            {{ session('create') }}
            {{ session('logout') }}
            {{ session('login') }}
        </div>
    @endif
    <section class="section--catalogue">
        @foreach ($products as $product)
            <article class="article--product">
                <a href="/producto/{{$product->id}}" class="product--imag--a"><img src="{{asset("storage/images/$product->img")}}" alt=""></a>
                <h3><a href="/producto/{{$product->id}}">{{$product->name}}</a></h3>
                <h4>${{$product->price}}</h4>
            </article>
        @endforeach        
    </section>
    
@endsection