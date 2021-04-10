@extends('layout.app')
@section('title','Nuevo Producto')
@section('main')

    <form action="" method="post" enctype="multipart/form-data" class="register--form">
        @csrf
        <section class="register--general">

            <label for="name" class="register--label--general">Titulo</label>
            <input type="text" name="name" id="name" class="register--input" value="{{old('name')}}">
            @error('name')
                <small class="error">{{$message}}</small>
            @enderror

            <label for="description" class="register--label--general">Descripción</label>
            <textarea name="description" placeholder="Ingrese una descripción" class="newProduct--textarea"></textarea>
            @error('description')
                <small class="error">{{$message}}</small>
            @enderror

            <label for="category" class="register--label--general">Categoria</label>
            <select name="category" class="register--select newProduct--select">
                <option value="" selected disabled hidden>Categoria</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            @error('category')
                <small class="error">{{$message}}</small>
            @enderror
            
            <div class="newProduct--country">
                <label for="" class="register--label--general">Paises disponibles</label>
                <div class="div__country"><input type="checkbox" name="country[]" id="argentina" value="argentina"><label for="argentina">Argentina</label></div>
                <div class="div__country"><input type="checkbox" name="country[]" id="bolivia" value="bolivia"><label for="bolivia">Bolivia</label></div>
                <div class="div__country"><input type="checkbox" name="country[]" id="paraguay" value="paraguay"><label for="paraguay">Paraguay</label></div>
                <div class="div__country"><input type="checkbox" name="country[]" id="chile" value="chile"><label for="chile">Chile</label></div>
                <div class="div__country"><input type="checkbox" name="country[]" id="mexico" value="mexico"><label for="mexico">México</label></div>
            </div>
            
        </section>
           
        <section class="newProduct--detail">

            <div class="newProduct--div">
                <label for="img">Imágen Principal</label>
                <input type="file" name="img" id="">
                @error('img')
                    <small class="error">{{$message}}</small>
                @enderror
            </div>

            <div class="newProduct--div">
                <label for="height" class="register--label">Altura</label>
                <input type="text" name="height" id="height" class="register--input" value="{{old('height')}}"> 
                @error('height')
                    <small class="error">{{$message}}</small>
                @enderror
            </div>
            
            <div class="newProduct--div">
                <label for="size" class="register--label">Talla</label>
                <input type="text" name="size" id="size" class="register--input" value="{{old('size')}}">
                @error('size')
                    <small class="error">{{$message}}</small>
                @enderror
            </div>

            <div class="newProduct--div">
                <label for="color1" class="register--label">Color 1</label>
                <input type="text" name="color1" id="color1" class="register--input" value="{{old('color1')}}">
                @error('color1')
                    <small class="error">{{$message}}</small>
                @enderror
            </div>

            <div class="newProduct--div">
                <label for="color2" class="register--label">Color 2</label>
                <input type="text" name="color2" id="color2" class="register--input" value="{{old('color2')}}">
                @error('color2')
                    <small class="error">{{$message}}</small>
                @enderror
            </div>

            <div class="newProduct--div">
                <label for="color3" class="register--label">Color 3</label>
                <input type="text" name="color3" id="color3" class="register--input" value="{{old('color3')}}">
                @error('color3')
                    <small class="error">{{$message}}</small>
                @enderror
            </div>

            <div class="newProduct--div">
                <label for="texture" class="register--label">Contextura</label>
                <input type="text" name="texture" id="texture" class="register--input" value="{{old('texture')}}">
                @error('texture')
                    <small class="error">{{$message}}</small>
                @enderror
            </div>

            <div class="newProduct--div">
                <label for="price" class="register--label">Precio</label>
                <input type="text" name="price" id="price" class="register--input price" value= @if(!$errors->has('price')) "{{old('price')}}" @endif>
                @error('price')
                    <small class="error">{{$message}}</small>
                @enderror
            </div>

            <div class="newProduct--div">
                <label for="phone" class="register--label">Teléfono</label>
                <input type="text" name="phone" id="phone" class="register--input" value="{{old('texture')}}">
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