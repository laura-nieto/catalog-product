@extends('layout.app')
@section('title','Producto - ')
@section('main')

    <section class="section--general">
        <article class="article--general">
            <img src="https://media.missguided.com/i/missguided/DD925864_01?fmt=jpeg&fmt.jpeg.interlaced=true&$product-page__main--2x$" alt="">
            <h2>Title</h2>
        </article>
        <article class="article--desciption">
            <h2 class="margin-bot">Descripción</h2>
            <p class="p-size"> 
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis sed quaerat illo a quos temporibus minima, velit reprehenderit deleniti, atque eveniet, laboriosam nobis! Quibusdam magni doloremque molestias eos laborum veniam iste asperiores culpa placeat, labore blanditiis nihil velit repellat eaque debitis esse cumque voluptate. Quibusdam ducimus magni sint dolor nobis, doloribus nostrum? Inventore, in ad similique ab doloremque molestias iure rerum laborum, nulla cupiditate id blanditiis unde nemo eligendi ut, fugiat ipsam dolores ipsa minima perferendis culpa. A vero consectetur nesciunt accusantium, soluta similique voluptate nostrum ad tenetur delectus ratione. Quas alias libero nemo accusantium illo repellendus aliquam laudantium possimus.
            </p>
        </article>
        <article class="article--characteristics">
            <h2 class="margin-bot">Características</h2>
            <p class="p-size">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequatur distinctio ratione quasi, expedita modi neque dolore ipsa tempore dignissimos adipisci? Corrupti rerum quidem beatae minus sed, sapiente earum expedita deleniti esse quasi dolore perferendis fuga doloribus nesciunt harum molestiae neque dicta voluptas magnam blanditiis reiciendis iste. Distinctio aliquid provident architecto adipisci ratione ut. Enim, error. Quos inventore incidunt sed velit delectus est ab aut sequi ipsa, earum aliquid doloremque eveniet illo odio officiis a quis, nam sit aspernatur ipsum recusandae, ad alias. Quisquam, libero similique. Vero soluta nesciunt maxime cupiditate consectetur excepturi corrupti alias voluptate! Eaque possimus quam architecto voluptatem.
            </p>
        </article>
    </section>

    <section class="section--blocks">
        <h2>Bloque 1</h2>
        <div class="div--tabs">
            <ul class="ul--tab">
                <li class="li--tab border--tab border--tab--right border--tab--botton p-size">Fotos</li>
                <li class="li--tab border--tab border--tab--botton p-size">Videos</li>
            </ul>
        </div>
        <div class="tab--media tab--media--img border--tab active" data-tab="tab1">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQzr7uxbc5DT0HbZ83mEAr0FbCKbWBidqq76IZW3DaJ3ptU4DBoREOtd0uFpuerCymOQuY&usqp=CAU" alt="">
            <img src="https://s3-us-west-2.amazonaws.com/melingoimages/Images/69247.jpg" alt="">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQzr7uxbc5DT0HbZ83mEAr0FbCKbWBidqq76IZW3DaJ3ptU4DBoREOtd0uFpuerCymOQuY&usqp=CAU" alt="">
            <img src="https://s3-us-west-2.amazonaws.com/melingoimages/Images/69247.jpg" alt="">

            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQzr7uxbc5DT0HbZ83mEAr0FbCKbWBidqq76IZW3DaJ3ptU4DBoREOtd0uFpuerCymOQuY&usqp=CAU" alt="">
            <img src="https://s3-us-west-2.amazonaws.com/melingoimages/Images/69247.jpg" alt="">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQzr7uxbc5DT0HbZ83mEAr0FbCKbWBidqq76IZW3DaJ3ptU4DBoREOtd0uFpuerCymOQuY&usqp=CAU" alt="">
            <img src="https://s3-us-west-2.amazonaws.com/melingoimages/Images/69247.jpg" alt="">
        </div> 

        <div class="tab--media tab--media--video border--tab" data-tab="tab1">
            <video controls>
                <source src="{{asset('asset/World_of_Warcraft_2021-03-12_19-34-20.mp4')}}" type="video/mp4">
            </video>
            <video controls>
                <source src="{{asset('asset/World_of_Warcraft_2021-03-12_19-34-20.mp4')}}" type="video/mp4">
            </video>
            <video controls>
                <source src="{{asset('asset/World_of_Warcraft_2021-03-12_19-34-20.mp4')}}" type="video/mp4">
            </video>
            <video controls>
                <source src="{{asset('asset/World_of_Warcraft_2021-03-12_19-34-20.mp4')}}" type="video/mp4">
            </video>
        </div>

    </section>

    <section class="section--blocks">
        <h2>Bloque 2</h2>
        <div class="div--tabs">
            <ul class="ul--tab">
                <li class="li--tab border--tab border--tab--right border--tab--botton p-size" id="tab">Fotos</li>
                <li class="li--tab border--tab border--tab--botton p-size">Videos</li>
            </ul>
            <ul class="ul--tab ul--end">
                <li class="li--register"><a href="/registrar">Registrarse</a></li>
                <li class="li--register"><a href="/login">Iniciar Sesión</a></li>
            </ul>
        </div>
       
    </section>

    <section class="section--blocks">
        <h2>Bloque 3</h2>
        <div class="div--tabs">
            <ul class="ul--tab">
                <li class="li--tab border--tab border--tab--right border--tab--botton p-size" id="tab5">Fotos</li>
                <li class="li--tab border--tab border--tab--botton p-size" id="tab6">Video</li>
            </ul>
            <ul class="ul--tab ul--end">
                <li class="li--register"><a href="/registrar">Registrarse</a></li>
                <li class="li--register"><a href="/login">Iniciar Sesión</a></li>
                <li class="li--register"><a href="/">Paypal</a></li>
            </ul>
        </div>
        <div class="tab--media tab--media--img border--tab active" data-tab="tab5">
            <h1>Fotos</h1>
        </div>

        <div class="tab--media tab--media--video border--tab" data-tab="tab6"><h1>Video</h1> </div>
    </section>
@endsection