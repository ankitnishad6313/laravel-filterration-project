<?php

namespace App\Http\Controllers;

use App\Mail\SendOrderMail;
use App\Models\Product;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Mail;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function products(){
        $products = Product::limit(15)->get();
        $data = [
            'title' => 'Product List',
            'date' => date('d-M-Y'),
            'products' => $products,
        ];

        $pdf = PDF::loadview('emails.product', $data);
        $data['pdf'] = $pdf;

        Mail::to('ankitnishad6313@gmail.com')->send(new SendOrderMail($data));
        dd("Mail sent");
    }
        // return $pdf->download('invoice.pdf');
        // return view('product', compact('products'));

    public function index(Request $request)
    {
        $query = Product::query();
        
        if($request->name != null){
            $query->where('name', 'like', "%$request->name%");
        }
        
        if($request->category_id != null){
            $query->where('category_id', $request->category_id);
        }

        if($request->min_price && $request->max_price){
            $query->where('price', '>=', $request->min_price)->where('price', '<=', $request->max_price);
        }

        $products = $query->with('category:id,name,status')->paginate(10);
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
