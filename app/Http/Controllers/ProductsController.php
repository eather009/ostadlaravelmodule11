<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\error;

class ProductsController extends Controller
{
    public function index(Request $request){
        $products = DB::table('products')->where('store_owner_id', Auth::id())->get();
        $header = 'Products List';

        return view('products.index', compact('products', 'header'));
    }

    public function store(Request $request){
        $header = 'Add New Product';
        if($request->isMethod('post')){
            $request->validate([
                'name' => 'required|string',
                'quantity' => 'required|integer|min:0',
                'price' => 'required|numeric|min:0',
            ]);

            try{
                DB::table('products')->insert([
                    'name' => $request->input('name'),
                    'quantity' => $request->input('quantity'),
                    'price' => $request->input('price'),
                    'store_owner_id' => Auth::id(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }catch (\Exception $ex){

                return back()->withErrors(['name' => $ex->getMessage()]);
            }

            return redirect()->route('products.index');
        }

        return view('products.add', compact('header'));
    }

    public function update(Request $request, $id){

        $header = 'Product Details';
        $product = DB::table('products')->where('store_owner_id', Auth::id())->find($id);

        if(empty($product)){
            return redirect()->route('products.index');
        }
        if($request->isMethod('POST') || $request->isMethod('PATCH')){
            $request->validate([
                'name' => 'required|string',
                'quantity' => 'required|integer|min:0',
                'price' => 'required|numeric|min:0',
            ]);

            DB::table('products')->where('id', $id)
                ->update([
                'name' => $request->input('name'),
                'quantity' => $request->input('quantity'),
                'price' => $request->input('price'),
                'updated_at' => now(),
            ]);

            return redirect()->route('products.index');
        }



        return view('products.edit', compact('product', 'header'));
    }

    public function delete(Request $request, $id){

        DB::table('products')->where('store_owner_id', Auth::id())->where('id', $id)->delete();

        return redirect()->route('products.index');
    }

}
