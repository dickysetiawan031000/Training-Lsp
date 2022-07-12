<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Buy;
use App\Models\Product;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class BuyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.buy.index', [
            'buys' => Buy::with('product')->get()
        ]);
    }

    public function accepted($id, $product)
    {

        $status = Buy::where('id', $id)->first();
        $stock = Product::where('id', $product)->first();
        $buy = Buy::where('id', $id)->first();

        // dd();

        if ($status->status == 'rejected' && $stock->stock > $buy->qty) {

            $updateStock = $stock->stock - $buy->qty;

            Buy::where('id', $id)->update(['status' => 'accepted']);

            Product::where('id', $product)->update(['stock' => $updateStock]);
            return redirect()->route('admin.buy.index')->with('accept', 'Order has been accepted!');
        } else if ($status->status == 'accepted') {
            return redirect()->route('admin.buy.index')->with('allreadyaccepted', 'Order Allready Accepted!');
        } else {
            return redirect()->route('admin.buy.index')->with('outofstock', 'Your item is out of stock!');
        }


        // } elseif ($stock < $buy) {
        //     return redirect()->route('admin.buy.index')->with('outofstock', 'Your item is out of stock!');
        // }
    }
    public function rejected($id, $product)
    {

        $status = Buy::where('id', $id)->first();
        $stock = Product::where('id', $product)->first();
        $buy = Buy::where('id', $id)->first();


        if ($status->status == 'accepted') {
            $updateStock = $stock->stock + $buy->qty;

            Buy::where('id', $id)->update(['status' => 'rejected']);

            Product::where('id', $product)->update(['stock' => $updateStock]);
            return redirect()->route('admin.buy.index')->with('reject', 'Order has been rejected!');
        } else {
            Buy::where('id', $id)->update(['status' => 'rejected']);
            return redirect()->route('admin.buy.index')->with('allreadyrejected', 'Order Allready rejected!');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
