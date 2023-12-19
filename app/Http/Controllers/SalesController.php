<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class SalesController extends Controller
{
    public function index(Request $request)
    {
        $sales = DB::table('sales')
            ->join('products', 'sales.product_id', '=', 'products.id')
            ->where('products.store_owner_id', Auth::id())
            ->select([
                'sales.id', 'sales.sale_quantity', 'sales.sale_amount', 'sales.sale_date',
                'products.name',
                'products.quantity',
                'products.price'
            ])->get();

        $header = 'Sale List';

        return view('sales.index', compact('sales', 'header'));
    }

    public function store(Request $request)
    {
        $header = 'Add New Sale';
        $products = DB::table('products')->where('store_owner_id', Auth::id())->where('quantity', '>', 0)->pluck('name', 'id');
        if ($request->isMethod('post')) {
            $request->validate([
                'product_id' => 'required',
                'sale_quantity' => [
                    'required',
                    'integer',
                ],
                'sale_amount' => [
                    'required',
                    'numeric',

                ],
                'sale_date' => [
                    'required',
                    'date',
                ],

            ]);
            try {
                DB::table('sales')->insert([
                    'product_id' => $request->input('product_id'),
                    'sale_quantity' => $request->input('sale_quantity'),
                    'sale_amount' => $request->input('sale_amount'),
                    'sale_date' => date('Y-m-d H:i:s', strtotime($request->input('sale_date'))),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                DB::table('products')
                    ->where('id', $request->input('product_id'))
                    ->decrement('quantity', $request->input('sale_quantity'));;
            } catch (\Exception $ex) {

                return redirect()->back()->withInput();
            }

            return redirect()->route('sales.index');
        }

        return view('sales.add', compact('header', 'products'));
    }
}
