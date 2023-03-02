<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Productquo;
use App\Models\Productrems;
use App\Models\Quotation;
use App\Models\Remission;
use App\Models\Subsidiary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PDF;

class RemissionController extends Controller
{
    public function index($id){

        $quote = Quotation::with('subsidiaries')->find($id);
        $products = Productquo::where('quotation_id', '=', $id)->get();
        $categories = Category::all();

        return view('remissions.index', compact('quote', 'products', 'categories'));
    }

    public function store(Request $request){

        $totales = collect($request->totales);
        
        $remission = Remission::create([
            'serie' => $totales[0]["serie"],
            'folio' => $totales[0]["folio"],
            'subtotal' => $totales[0]["subtotal"],
            'discount' => $totales[0]["discount"],
            'total' => $totales[0]["total"],
        ]);

        $rem = Remission::find($remission->id);

        $rem->subsidiaries()->attach($request->customers);

        $customer = Subsidiary::find($request->customers);

        $cad = []; 
        $tot = [
            'serie' => $totales[0]["serie"],
            'folio' => $totales[0]["folio"],
            'subtotal' => $totales[0]["subtotal"],
            'discount' => $totales[0]["discount"],
            'total' => $totales[0]["total"],
        ];

        array_push($tot, $totales);

        foreach($request->products as $product){
            $collect = collect($product);
            $cleanCollect = $collect->only('product_id', 'name', 'cant', 'description', 'price', 'subtotal');
            array_push($cad, $cleanCollect);
            Productrems::create([
                'remission_id' => $remission->id,
                'product_id' => $cleanCollect["product_id"],
                'name' => $cleanCollect["name"],
                'cant' => $cleanCollect["cant"],
                'description' => $cleanCollect["description"],
                'price' => $cleanCollect["price"],
                'subtotal' => $cleanCollect["subtotal"],
            ]);
        }
        
        $data["products"] = $cad; 
        $data["email"] = $customer[0]["email"];
        $data["address"] = $customer[0]["send_address"];
        $data["tel"] = $customer[0]["telephone"];
        $data["alias"] = $customer[0]["alias"];
        $data["title"] = "Cotizaciones";
        $data["tot"] = $tot;

        $pdf = PDF::loadView('remissions.pdf', compact('data'));
  
        Mail::send('emails.remisiones', $data, function($message)use($data, $pdf) {
            $message->to($data["email"], $data["email"])
                    ->subject($data["title"])
                    ->attachData($pdf->output(), "nota_remision.pdf");
        });

        // return $totales;
        return $request->products;
    }
}
