<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\Buy;
use App\Models\Product;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Buy::with('product')->get());
        return view('customer.buy.index', [
            'buys' => Buy::with('product')->where('user_id', Auth::user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.buy.create', [
            'products' => Product::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'product_id' => ['required'],
            'user_id' => ['required'],
            'qty' => ['required']
        ]);

        $price = Product::where('id', $validatedData['product_id'])->first()->price;

        $total = ($price) * $validatedData['qty'];

        Buy::create([
            'product_id' => $validatedData['product_id'],
            'user_id' => $validatedData['user_id'],
            'qty' => $validatedData['qty'],
            'price' => $price,
            'total' => $total,
            'status' => 'rejected'
        ]);

        return redirect()->route('customer.buy.index')->with('success', 'Your order has been submitted successfully!');
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
    public function edit(Buy $buy, Product $product)
    {
        return view('customer.buy.edit', [
            'buy' => $buy,
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buy $buy)
    {
        $rules = [
            'product_id' => ['required'],
            'user_id' => ['required'],
            'qty' => ['required']
        ];

        $price = Product::where('id', $rules['product_id'])->first()->price;

        $total = $price * $request->$rules['qty'];


        $validateData = $request->validate([
            'product_id' => $rules['product_id'],
            'user_id' => $rules['user_id'],
            'qty' => $rules['qty'],
            'price' => $price,
            'total' => $total,
            'status' => 'rejected'
        ]);
        Buy::where('id', $buy->id)
            ->update($validateData);
        return redirect()->route('admin.product.index')->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buy $buy)
    {
        Buy::destroy($buy->id);

        return redirect()->route('customer.buy.index')->with('delete', 'Product has been Deleted!');
    }
}
