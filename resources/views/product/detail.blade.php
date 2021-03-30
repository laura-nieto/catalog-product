@extends('layout.app')
@section('title','Producto - ')
@section('main')

    @php    
        $image = $product->asset->where('type','image')->chunk(4);
        $page1_img = $image->get(0);
        $page2_img = $image->get(1);
        $page3_img = $image->get(2);

        $video = $product->asset->where('type','video')->chunk(4);
        $page1_video = $video->get(0);
        $page2_video = $video->get(1);
        $page3_video = $video->get(2);
    @endphp
    
    <section class="section--general">
        <article class="article--general">
            <img src="{{asset("storage/images/$product->img")}}" alt="Imágen del producto">
            <h2>{{$product->name}}</h2>
        </article>
        <article class="article--desciption">
            <h2 class="margin-bot">Descripción</h2>
            <p class="p-size"> 
                {{$product->description}}
            </p>
        </article>
        <article class="article--characteristics">
            <h2 class="margin-bot">Características</h2>
            <h4 class="p-size">Colores: </h4><p class="p-size">{{$product->product_detail->color1 . ", " . $product->product_detail->color2 . ", " . $product->product_detail->color3}}</p><br>
            <h4 class="p-size">Altura: </h4><p class="p-size">{{$product->product_detail->height}}</p><br>
            <h4 class="p-size">Talla: </h4><p class="p-size">{{$product->product_detail->size}}</p><br>
            <h4 class="p-size">Contextura: </h4><p class="p-size">{{$product->product_detail->texture}}</p><br>
            <h4 class="p-size">Teléfono: </h4><p class="p-size">{{$product->phone}}</p><br>
        </article>
        <article class="article--price">
            <h2>Precio: ${{$product->price}}</h2>
        </article>
    </section>

    <section class="section--blocks">
        <h2>Bloque 1</h2>
        <div class="div--tabs">
            <ul class="ul--tab">
                <li class="li--tab border--tab border--tab--right border--tab--botton p-size active">Fotos</li>
                <li class="li--tab border--tab border--tab--botton p-size inactive">Videos</li>
            </ul>
        </div>
       
        <div class="tab--media--img border--tab active">
            @if ($product->asset->isEmpty() || $page1_img === null)
                <h3>No hay fotos</h3>
            @else
                @foreach ($page1_img as $asset)
                    <img src="{{asset("storage/images/$asset->route")}}" alt="Imágen del producto">
                @endforeach
            @endif
        </div> 

        <div class="tab--media--video border--tab inactive">      
            @if ($product->asset->isEmpty() || $page1_video === null)
                <h3>No hay videos</h3>
            @else
                @foreach ($page1_video as $asset)
                    <video controls>
                        <source src="{{asset("storage/videos/$asset->route")}}" type="video/mp4">
                    </video> 
                @endforeach
            @endif
        </div>
    </section>

    <section class="section--blocks">
        <h2>Bloque 2</h2>
        <div class="div--tabs">
            <ul class="ul--tab">
                <li class="li--tab border--tab border--tab--right border--tab--botton p-size active">Fotos</li>
                <li class="li--tab border--tab border--tab--botton p-size inactive">Videos</li>
            </ul>
            @guest
                <ul class="ul--tab ul--end">
                    <li class="li--register"><a href="/registrar">Registrarse</a></li>
                    <li class="li--register"><a href="/login">Iniciar Sesión</a></li>
                </ul>
            @endguest  
        </div>
        <div class="tab--media--img border--tab active">
            @auth
                @if ($product->asset->isEmpty() || $page2_img === null)
                    <h3 class="tab--title">No hay fotos</h3>
                @else
                    @foreach ($page2_img as $asset)
                        <img src="{{asset("storage/images/$asset->route")}}" alt="Imágen del producto">
                    @endforeach
                @endif
            @endauth
            @guest
                <h3 class="tab--title">Debe registrarse para ver el contenido</h3>
            @endguest
        </div>
        <div class="tab--media--video border--tab inactive">
            @auth
                @if ($product->asset->isEmpty() || $page2_video === null)
                    <h3 class="tab--title">No hay videos</h3>
                @else
                    @foreach ($page2_video as $asset)
                        <video controls>
                            <source src="{{asset("storage/videos/$asset->route")}}" type="video/mp4">
                        </video>   
                    @endforeach
                @endif
            @endauth
            @guest
                <h3 class="tab--title">Debe registrarse para ver el contenido</h3>
            @endguest
        </div>
    </section>

    <section class="section--blocks">
        <h2>Bloque 3</h2>
        <div class="div--tabs">
            <ul class="ul--tab">
                <li class="li--tab border--tab border--tab--right border--tab--botton p-size active">Fotos</li>
                <li class="li--tab border--tab border--tab--botton p-size">Video</li>
            </ul>
            @guest
                <ul class="ul--tab ul--end">
                    <li class="li--register"><a href="/registrar">Registrarse</a></li>
                    <li class="li--register"><a href="/login">Iniciar Sesión</a></li>
                </ul>
                @endguest  
            @auth
                <ul class="ul--tab ul--end">
                    <li class="li--register"><a href="/">Paypal</a></li>
                </ul>
            @endauth 
        </div>
        <div class="tab--media--img border--tab active">
            @auth
                @if ($product->asset->isEmpty() || $page3_img === null)
                    <h3 class="tab--title">No hay fotos</h3>
                @else
                    @foreach ($page3_img as $asset)
                        <img src="{{asset("storage/images/$asset->route")}}" alt="Imágen del producto">
                    @endforeach
                @endif  
            @endauth
            
            @guest
                <h3 class="tab--title">Debe registrarse para ver el contenido</h3>
            @endguest
        </div>

        <div class="tab--media--video border--tab inactive">
            @auth
                @if ($product->asset->isEmpty() || $page3_video === null)
                    <h3 class="tab--title">No hay videos</h3>
                @else
                    @foreach ($page3_video as $asset)
                        <video controls>
                            <source src="{{asset("storage/videos/$asset->route")}}" type="video/mp4">
                        </video> 
                    @endforeach
                @endif
            @endauth
            @guest
                <h3 class="tab--title">Debe registrarse para ver el contenido</h3>
            @endguest
        </div>
    </section>
@endsection