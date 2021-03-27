<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Category;
use App\Product_detail;
use App\Asset;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $asset = new Asset;
    

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
        
        
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->phone = $request->phone;
        $product->category_id = $request->category;
        $product->product_detail_id = $product_detail->id;
        $product->img = $imgName;

        $product->save();
        
        //ASSET
            if($request->hasfile('asset_img')) {
                foreach($request->file('asset_img') as $img){
                    $path = $img->getClientOriginalExtension();
                    $originalName = $img->getClientOriginalName();
                    $imgName = date('y-m-d').'-'.$request->name.'-'.$originalName.'.'.$path;

                    $img->storeAs('images',$imgName,'public');

                    $asset->route = $imgName;
                    $asset->product_id = $product->id;

                    $asset->save();
                }
            }
            if($request->hasfile('asset_video')){
                foreach($request->file('asset_video') as $video){
                    $path = $video->getClientOriginalExtension();
                    $originalName = $video->getClientOriginalName();
                    $videoName = date('y-m-d').'-'.$request->name.'-'.$originalName.'.'.$path;

                    $video->storeAs('images',$videoName,'public');

                    $asset->route = $videoName;
                    $asset->product_id = $product->id;
                
                    $asset->save();
                }
            }

        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
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