@extends('layout.app')
@section('title','Registrate -')
@section('main')


    <form action="" method="post" class="register--form">
        @csrf
        <section class="register--general">

            <label for="name" class="register--label--general">Nombres</label>
            <input type="text" name="name" id="name" class="register--input" value="{{old('name')}}">
            @error('name')
                <small id="emailHelp" class="error">{{$message}}</small>
            @enderror

            <label for="lastname" class="register--label--general">Apellidos</label>
            <input type="text" name="lastname" id="lastname" class="register--input" value="{{old('lastname')}}">
            @error('lastname')
                <small id="emailHelp" class="error">{{$message}}</small>
            @enderror
         
            <label for="email" class="register--label--general">Correo</label>
            <input type="email" name="email" id="email" class="register--input" value= @if(!$errors->has('price')) "{{old('email')}}" @endif> 
            @error('email')
                <small id="emailHelp" class="error">{{$message}}</small>
            @enderror
      
            <label for="phone" class="register--label--general">Telefono</label>
            <input type="text" name="phone" id="phone" class="register--input" value="{{old('phone')}}">
            @error('phone')
                <small id="emailHelp" class="error">{{$message}}</small>
            @enderror
           
            <label for="password" class="register--label--general">Contraseña</label>
            <input type="password" name="password" id="password" class="register--input">
            @error('password')
                <small id="emailHelp" class="error">{{$message}}</small>
            @enderror

            <select name="country" class="register--select">
                <option value="" selected disabled hidden>País</option>
                <option value="argentina">Argentina</option> 
                <option value=""></option> 
                <option value=""></option>
                <option value=""></option> 
                <option value=""></option> 
                <option value=""></option> 
            </select>
            @error('country')
                <small id="emailHelp" class="error">{{$message}}</small>
            @enderror

        </section>
           
        <section class="register--preferences">

            <h2>Preferencias</h2>

            <div class="register--preferences--div">
                <label for="height" class="register--label">Altura</label>
                <input type="text" name="height" id="height" class="register--input" value="{{old('height')}}"> 
                @error('height')
                    <small id="emailHelp" class="error">{{$message}}</small>
                @enderror
            </div>
            
            <div class="register--preferences--div">
                <label for="size" class="register--label">Talla</label>
                <input type="text" name="size" id="size" class="register--input" value="{{old('size')}}">
                @error('size')
                    <small id="emailHelp" class="error">{{$message}}</small>
                @enderror
            </div>

            <div class="register--preferences--div">
                <label for="color1" class="register--label">Color 1</label>
                <input type="text" name="color1" id="color1" class="register--input" value="{{old('color1')}}">
                @error('color1')
                    <small id="emailHelp" class="error">{{$message}}</small>
                @enderror
            </div>

            <div class="register--preferences--div">
                <label for="color2" class="register--label">Color 2</label>
                <input type="text" name="color2" id="color2" class="register--input" value="{{old('color2')}}">
                @error('color2')
                    <small id="emailHelp" class="error">{{$message}}</small>
                @enderror
            </div>

            <div class="register--preferences--div">
                <label for="color3" class="register--label">Color 3</label>
                <input type="text" name="color3" id="color3" class="register--input" value="{{old('color3')}}">
                @error('color3')
                    <small id="emailHelp" class="error">{{$message}}</small>
                @enderror
            </div>

            <div class="register--preferences--div">
                <label for="texture" class="register--label">Contextura</label>
                <input type="text" name="texture" id="texture" class="register--input" value="{{old('texture')}}">
                @error('texture')
                    <small id="emailHelp" class="error">{{$message}}</small>
                @enderror
            </div>

            <div class="register--preferences--div">
                <label for="price" class="register--label">Tarifa</label>
                <input type="text" name="price" id="price" class="register--input price" value= @if(!$errors->has('price')) "{{old('price')}}" @endif>
                @error('price')
                    <small id="emailHelp" class="error">{{$message}}</small>
                @enderror
            </div>

        </section>
        
        <button type="submit" class="register--btn btn">Registrar</button>

    </form>
    @endsection