@extends('layout.app')
@section('title','Producto - ')
@section('main')
    <form action="" method="post" enctype="multipart/form-data" class="modify--form">
        @csrf
        @method("PUT")

        <section class="modify--section">

            <div class="modify--div">
                <label for="height" class="register--label">Altura</label>
                <input type="text" name="height" id="height" class="register--input" value="{{$product->product_detail->height}}"> 
                @error('height')
                    <small class="error">{{$message}}</small>
                @enderror
            </div>
            
            <div class="modify--div">
                <label for="size" class="register--label">Talla</label>
                <input type="text" name="size" id="size" class="register--input" value="{{$product->product_detail->size}}">
                @error('size')
                    <small class="error">{{$message}}</small>
                @enderror
            </div>

            <div class="modify--div">
                <label for="color1" class="register--label">Color 1</label>
                <input type="text" name="color1" id="color1" class="register--input" value="{{$product->product_detail->color1}}">
                @error('color1')
                    <small class="error">{{$message}}</small>
                @enderror
            </div>

            <div class="modify--div">
                <label for="color2" class="register--label">Color 2</label>
                <input type="text" name="color2" id="color2" class="register--input" value="{{$product->product_detail->color2}}">
                @error('color2')
                    <small class="error">{{$message}}</small>
                @enderror
            </div>

            <div class="modify--div">
                <label for="color3" class="register--label">Color 3</label>
                <input type="text" name="color3" id="color3" class="register--input" value="{{$product->product_detail->color3}}">
                @error('color3')
                    <small class="error">{{$message}}</small>
                @enderror
            </div>

            <div class="modify--div">
                <label for="texture" class="register--label">Contextura</label>
                <input type="text" name="texture" id="texture" class="register--input" value="{{$product->product_detail->texture}}">
                @error('texture')
                    <small class="error">{{$message}}</small>
                @enderror
            </div>

            <div class="modify--div">
                <label for="price" class="register--label">Precio</label>
                <input type="text" name="price" id="price" class="register--input price" value="{{$product->product_detail->price}}">
                @error('price')
                    <small class="error">{{$message}}</small>
                @enderror
            </div>

            <div class="modify--div">
                <label for="phone" class="register--label">Teléfono</label>
                <input type="text" name="phone" id="phone" class="register--input" value="{{$product->phone}}">
                @error('phone')
                    <small class="error">{{$message}}</small>
                @enderror
            </div>

        </section>
        
        <section class="newProduct--section--asset">

            <div class="newProduct--div--asset">
                <label for="img" class="register--label">Fotos</label>
                <input type="file" name="asset_img[]" multiple>
                @error('asset-img')
                    <small class="error">{{$message}}</small>
                @enderror
            </div>
            <div class="newProduct--div--asset">
                <label for="img" class="register--label">Videos</label>
                <input type="file" name="asset_video[]" multiple>
                @error('asset-video')
                    <small class="error">{{$message}}</small>
                @enderror
            </div>

        </section>
        
        <button type="submit" class="register--btn btn">Registrar</button>
    </form>
@endsection