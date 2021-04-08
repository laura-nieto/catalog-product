<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Product_detail;

class UserController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $rules = [
            'email' => 'required',
            'password' => 'required',
        ];

        $message = [
            'required' => 'El campo :attribute es obligatorio',
        ];

        $validate = $request->validate($rules,$message);

        if($request->remember){
            $remember = true;
        } else {
            $remember = false;
        }

        if (Auth::attempt($credentials,$remember)) {
            // Authentication passed...
            return redirect()->route('index');
        } else {
            $errors = (['password' => ['El usuario o la contraseña son inválidos.']]);

            return back()->withErrors($errors);
        }
    }

    public function logOut(){
        Auth::logout();
        return redirect('/');
    }

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
        return view('auth.registerUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;
        $product_detail = new Product_detail;

        $rules = [
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|unique:users,email|email:rfc,dns',
            'password' => 'required|min:6',
            'phone' => 'required|numeric',
            'country' => 'required',

            'height' => 'required',
            'size' => 'required',
            'color1' => 'required',
            'color2' => 'required',
            'color3' => 'required',
            'texture' => 'required',
            'price' => 'required|numeric',
        ];

        $message = [
            'unique' => 'El email ingresado ya está registrado',
            'required' => 'El campo es obligatorio',
            'min' => 'La contraseña debe tener al menos :min caracteres',
            'email' => 'La dirección de correo debe ser válida',
            'numeric' => 'El campo debe ser numérico'
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
        
        //TABLE Users
        $user->name = $request->name;
        $user->last_name = $request->lastname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->country = $request->country;
        $user->product_detail_id = $product_detail->id;
        $user->account_type = $request->account_type;

        $user->save();

        return redirect()->route('login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
