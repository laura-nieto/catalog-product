@extends('layout.app')
@section('title','Iniciar Sesión -')
@section('main')
    <form action="" method="post" class="login--form">
        @csrf
        <article class="login--title">
            <h2>Ingresá a tu cuenta</h2>
        </article>
        @error('password')
            <small id="emailHelp" class="error error-login">{{$message}}</small>
        @enderror
        <article class="login--login">
            
            <label for="email" class="login--label">Correo</label>
            <input type="email" name="email" placeholder="Email" class="login--input">

            <label for="password" class="login--label">Contraseña</label>
            <input type="password" name="password" placeholder="Password" class="login--input">

            <input type="checkbox" name="remember" id="remember" class="login--checkbox">
            <label for="remember" class="login--label--remember">Recordarme</label>

            <button type="submit" class="login--btn">Ingresar</button>
        </article>
    </form>
@endsection