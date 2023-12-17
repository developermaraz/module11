<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class productsController extends Controller
{
    public function index()
    {
        $todaySale = DB::table('sales')
        ->whereDay('created_at', '=', date('d')+1)
        ->sum('totalPrice');
        $yesterdaySale = DB::table('sales')
        ->whereDay('created_at', '=', date('d'))
        ->sum('totalPrice');
        $ThisMonthSale = DB::table('sales')
        ->whereMonth('created_at', '=', date('m'))
        ->sum('totalPrice');
        $LastMonthSale = DB::table('sales')
        ->whereMonth('created_at', '=', date('m')-1)
        ->sum('totalPrice');
        $data = [
            'todaySale'     => $todaySale,
            'yesterdaySale' => $yesterdaySale,
            'ThisMonthSale' => $ThisMonthSale,
            'LastMonthSale' => $LastMonthSale,
        ];
        return view('dashboard', compact('data'));
    }
    public function addProduct(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:25',
            'quantity' => 'required|string|max:25',
            'price' => 'required|string|max:100',
        ]);
        DB::table('products')->insert([
            'name' => $request->name,
            'qty' => $request->quantity,
            'price' => $request->price,
        ]);
        return redirect()->back()->with('success', 'Product Created Successfully');
    }

    public function getProducts()
    {
        $data = DB::table('products')->get();
        return view('products', compact('data'));
    }
    public function sellProductDataGet($id)
    {
        $data = DB::table('products')->where('id', '=', $id)->get();
        return view('sell-product', compact('data'));
    }
    public function sellProduct(Request $request, $id)
    {
        $this->validate($request, [
            'quantity' => 'required|string|max:100',
        ]);
        $totalPrice = $request->quantity * $request->price;
        $newQty = $request->qty - $request->quantity;
        $totalPrice = $request->quantity * $request->price;
        DB::table('products')
            ->where('id', $request->id)
            ->update(['qty' => $newQty]);
        DB::table('sales')->insert(['product_id' => $request->id, 'qty' => $request->quantity, 'perPrice' => $request->price, 'totalPrice' => $totalPrice]);

        return redirect()->back()->with('success', 'Successfully Sell The Product');
    }
    public function UpdateProductDataGet($id)
    {
        $data = DB::table('products')->where('id', '=', $id)->get();
        return view('update-product', compact('data'));
    }
    public function UpdateProduct(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'price' => 'required|string|max:100',
            'quantity' => 'required|string|max:100',
        ]);
        DB::table('products')
            ->where('id', $request->id)
            ->update([
                'name' => $request->name,
                'price' => $request->price,
                'qty' => $request->quantity
            ]);
        return redirect()->back()->with('success', 'Successfully Update The Product');
    }
    public function deleteProduct(Request $request, $id)
    {
        DB::table('products')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Successfully deleted the product');
    }
    public function getSaleHistory()
    {
        $data = DB::table('sales')
        ->join('products', 'sales.product_id', '=', 'products.id')
        ->get();
        return view('history', compact('data'));
    }
}
