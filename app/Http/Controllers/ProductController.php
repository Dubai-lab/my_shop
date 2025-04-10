<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator; 
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function product_page(){
        return view('product_page');
    }

    public function register_product(Request $request){
        $product_validate=$request->validate([
            'name'=>'required',
            'price'=>'required',
            'stock_quantity'=>'required',
            'image_path'=>'nullable',
        ]);

        if($request->hasFile('image_path')){
            $imageName = $request->file('image_path')->getClientOriginalName();
            $request->file('image_path')->move(public_path('product_images'), $imageName);
            $product_validate['image_path'] = $imageName;
        }

        Product::create($product_validate);

        return redirect()->back()->with('success', 'Product Created Successfully!');
    }

    public function delete_product($id){
        $product = Product::where('id', $id)->first();
        $product->delete();
        return redirect()->route('home_page')->with('success', 'Product deleted successfully!');
    }

    public function sell_product(Request $request, $id){
        $product = Product::where('id', $id)->first();
        $new_quantity = $request->input('sold_quantity');

        $product->stock_quantity = $product->stock_quantity - $new_quantity;
        $product->save();
        
        return redirect()->back()->with('success', 'Thanks for comming');

    }
}
