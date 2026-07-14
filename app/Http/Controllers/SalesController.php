<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sales;
use App\Models\Product;
use App\Models\Customer;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvoiceMail;

class SalesController extends Controller
{
   public function store(Request $request)
{

   $sale = Sales::create([
    'customer_id' => $request->customer_id,
    'sub_total' => $request->sub_total,
    'discount_percentage' => $request->discount_percentage,
    'grand_total' => $request->grand_total
]);

    $items = json_decode($request->items, true);


    foreach($items as $item)
    {

        $sale->saleItems()->create([

            'product_id' => $item['product_id'],
            'quantity' => $item['quantity'],
            'price' => $item['price'],
            'total' => $item['total']

        ]);

    }


    return redirect()->route('sales.show',$sale->id);

}


    
    public function create()
{
    $products=Product::all();
    $customers = Customer::all();

    return view('sales.create', compact('products','customers'));
}


public function index()
{
    $sales = Sales::with('customer')->latest()->get();

    return view('sales.index', compact('sales'));
}



public function show(string $id)
{
    $sale = Sales::with('customer', 'saleItems.product')
                 ->findOrFail($id);

    return view('sales.show', compact('sale'));
}
public function invoice( string $id)
{
    $sale = Sales::with('customer', 'saleItems.product')->findOrFail($id);

    return view('sales.invoice', compact('sale'));
}
public function pdf( string $id)
{
    $sale = Sales::with('customer', 'saleItems.product')->findOrFail($id);

    $pdf = Pdf::loadView('sales.invoice', compact('sale'));

    return $pdf->download('Invoice-' . $sale->id . '.pdf');
}
public function sendEmail(string $id)
{
    try {
        $sale = Sales::with('customer', 'saleItems.product')->findOrFail($id);

        $pdf = Pdf::loadView('sales.invoice', compact('sale'));

        Mail::to($sale->customer->email)
            ->send(new InvoiceMail($sale, $pdf));

        return redirect()->route('sales.invoice', $sale->id)
            ->with('success', 'Email sent successfully!');
    } catch (\Exception $e) {
        return dd($e->getMessage());
    }
} 
}   