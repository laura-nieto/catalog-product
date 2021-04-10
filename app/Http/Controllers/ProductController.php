<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Category;
use App\Product_detail;
use App\Asset;
use Illuminate\Support\Facades\Auth;
use Stevebauman\Location\Facades\Location;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::orderBy('id','desc')->get();
        return view('index',['products'=>$product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('product.newProduct',['categories'=>$category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;
        $product_detail = new Product_detail;

        $rules = [
            'name' => 'required',
            'description' => 'required',
            'category' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'phone' => 'required|numeric',
            'price' => 'required|numeric',
            
            'height' => 'required',
            'size' => 'required',
            'color1' => 'required',
            'color2' => 'required',
            'color3' => 'required',
            'texture' => 'required',

            'asset_img[]' =>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'asset_video[]' =>'mimes:mp4,mov,ogg,avi|max:20000'
        ];

        $message = [
            'required' => 'El campo es obligatorio',
            'numeric' => 'El campo debe ser numérico',
            'image' => 'La imagen debe ser en formato: jpeg, png, jpg, gif, svg',
            'img.mimes' => 'La imagen debe ser en formato: jpeg, png, jpg, gif, svg',
            'asset_img.img' => 'La imagen debe ser en formato: jpeg, png, jpg, gif, svg',
            'image.max' => 'La imagen debe tener como maximo :max kb',
            'asset_video.mimes' => 'El video debe ser en formato: mp4, mov, ogg, avi',
            'asset_video.max' => 'El video debe pesar menos de :max kb'
        ];

        $validate = $request->validate($rules,$message);
        
        //TABLE Product_detail
        $product_detail->height = $request->height;
        $product_detail->size = $request->size;
        $product_detail->color1 = $request->color1;
        $product_detail->color2 = $request->color2;
        $product_detail->color3 = $request->color3;
        $product_detail->texture = $request->texture;
        $product_detail->price = $request->price;
        
        $product_detail->save();
        
        //IMG
        if($request->hasfile('img')){
            $path = $request->file('img')->getClientOriginalExtension();
            $originalName = $request->file('img')->getClientOriginalName();
            $imgName = date('y-m-d').'-'.$request->name.'-'.$originalName.'.'.$path;
            
            $request->file('img')->storeAs('images',$imgName,'public');
        }
        
        //TABLE Products
        $product->name = $request->name;
        $product->description = $request->description;
        $product->country = json_encode($request->country);
        $product->price = $request->price;
        $product->phone = $request->phone;
        $product->category_id = $request->category;
        $product->product_detail_id = $product_detail->id;
        $product->img = $imgName;

        $product->save();
        
        //ASSET
            if($request->hasfile('asset_img')) {
                foreach($request->file('asset_img') as $img){
                    $asset = new Asset;

                    $path = $img->getClientOriginalExtension();
                    $originalName = $img->getClientOriginalName();
                    $imgName = date('y-m-d').'-'.$request->name.'-'.$originalName.'.'.$path;

                    $img->storeAs('images',$imgName,'public');

                    $asset->route = $imgName;
                    $asset->product_id = $product->id;
                    $asset->type = 'image';

                    $asset->save();
                }
            }
            if($request->hasfile('asset_video')){
                foreach($request->file('asset_video') as $video){
                    $asset = new Asset;

                    $path = $video->getClientOriginalExtension();
                    $originalName = $video->getClientOriginalName();
                    $videoName = date('y-m-d').'-'.$request->name.'-'.$originalName.'.'.$path;

                    $video->storeAs('videos',$videoName,'public');

                    $asset->route = $videoName;
                    $asset->product_id = $product->id;
                    $asset->type = 'video';
                
                    $asset->save();
                }
            }

        // TABLE product_user
        if(Auth::user()){
            $idUser = Auth::user()->id;
            $product->product_user()->attach($idUser);
        }
        

        return redirect('/')->with('create','Producto creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product, $id)
    {
        $product = Product::where('id',$id)->first();
        
        $ip = '181.47.248.146'; //For static IP address get
        //$ip = request()->ip(); //Dynamic IP address get
        $data = Location::get($ip)->countryName;
        $data = strtolower($data);
        
        $productCountries = json_decode($product->country);
        
        foreach($productCountries as $country){
            if($country == $data){
                $available = true;
            } 
        }

        if(isset($available)){
            return view('product.detail',['product'=>$product]);
        } else {
            return view('product.detail',['product'=>$product])->with('country','Este producto no está disponible en tu país'); 
        }
 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product,$id)
    {
        $product = Product::findOrFail($id);
        return view('product.modify',['product'=>$product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request, Product $product)
    {
        $product = Product::findOrFail($id);
        $product_detail = $product->product_detail;
        
        // VALIDATE
        $rules = [
            'phone' => 'required|numeric',
            'price' => 'required|numeric',
            
            'height' => 'required',
            'size' => 'required',
            'color1' => 'required',
            'color2' => 'required',
            'color3' => 'required',
            'texture' => 'required',

            'asset_img[]' =>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'asset_video[]' =>'mimes:mp4,mov,ogg,avi|max:20000'
        ];

        $message = [
            'required' => 'El campo es obligatorio',
            'numeric' => 'El campo debe ser numérico',
            'image' => 'La imagen debe ser en formato: jpeg, png, jpg, gif, svg',
            'asset_img.mimes' => 'La imagen debe ser en formato: jpeg, png, jpg, gif, svg',
            'image.max' => 'La imagen debe tener como maximo :max kb',
            'asset_video.mimes' => 'El video debe ser en formato: mp4, mov, ogg, avi',
            'asset_video.max' => 'El video debe pesar menos de :max kb'
        ];
        
        // UPDATE
        $product_detail->update([
           'height' => $request->height,
           'size' => $request->size,
           'color1' => $request->color1,
           'color2' => $request->color2,
           'color3' => $request->color3,
           'texture' => $request->texture,
           'price' => $request->price,
        ]);
        $product->update([
            'price' => $request->price,
            'phone' => $request->phone
        ]);

        //ASSET
        if($request->hasfile('asset_img')) {
            foreach($request->file('asset_img') as $img){
                $asset = new Asset;

                $path = $img->getClientOriginalExtension();
                $originalName = $img->getClientOriginalName();
                $imgName = date('y-m-d').'-'.$request->name.'-'.$originalName;

                $img->storeAs('images',$imgName,'public');

                $asset->route = $imgName;
                $asset->product_id = $product->id;
                $asset->type = 'image';

                $asset->save();
            }
        }
        if($request->hasfile('asset_video')){
            foreach($request->file('asset_video') as $video){
                $asset = new Asset;

                $path = $video->getClientOriginalExtension();
                $originalName = $video->getClientOriginalName();
                $videoName = date('y-m-d').'-'.$request->name.'-'.$originalName;

                $video->storeAs('videos',$videoName,'public');

                $asset->route = $videoName;
                $asset->product_id = $product->id;
                $asset->type = 'video';
            
                $asset->save();
            }
        }
        return redirect('/')->with('update','Producto modificado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
