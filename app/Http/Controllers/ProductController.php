<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products= Product::all();
        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //ORM


        // object
        $product=new Product();
        $product->name=$request->name;
        $product->description= $request->description;
        $product->save();


        // from class -> class is the model
        // Product::create(
        //     ['name'=>$request->name,
        //       'description'=>$request->desription
        //     ]
        // );
        return redirect()->back()->with('success','product add successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product :: FindOrFail($id); // return value by using id

        return view('products.edit',compact('products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product =Product::FindOrFail($id);
        // $product->name =$request->name;
        // $product->description=$request->description;
        // $product->save();


        $product->update($request->all());
        return redirect()->back()->with('success','Product updated successfully');
    }



    public function archive(){

        // return all values where deleted_at is null
        //$product=Product::all();
        $products=Product::onlyTrashed()->get();
        return view("products.archive",compact('products'));

    }
    public function restore($id){
        Product::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('products.index');

    }
    public function force($id){
        Product::onlyTrashed()->findOrFail($id)->forceDelete();
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product =Product::FindOrFail($id);
        $product->delete();
        return redirect()->back()->with('succsess',' Product Delleted');
    }
}
