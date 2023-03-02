<?php

namespace App\Http\Controllers;

use App\Mail\CotizacionesMailable;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Productquo;
use App\Models\Quotation;
use App\Models\Subsidiary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PDF;

class QuotationController extends Controller
{

    public function index()
    {
        $customers = Customer::all();
        $categories = Category::all();

        return view('quotes.index', compact('customers', 'categories'));
    }

    public function store(Request $request){

        $totales = collect($request->totales);

        $quotation = Quotation::create([
            'serie' => $totales[0]["serie"],
            'folio' => $totales[0]["folio"],
            'iva' => $totales[0]["iva"],
            'subtotal' => $totales[0]["subtotal"],
            'discount' => $totales[0]["discount"],
            'total' => $totales[0]["total"],
        ]);

        $quo = Quotation::find($quotation->id);

        $quo->subsidiaries()->attach($request->customers);

        $customer = Subsidiary::find($request->customers);

        $cad = [];
        $tot = [
            'serie' => $totales[0]["serie"],
            'folio' => $totales[0]["folio"],
            'iva' => $totales[0]["iva"],
            'totDisc' => $totales[0]["totDisc"],
            'subtotal' => $totales[0]["subtotal"],
            'discount' => $totales[0]["discount"],
            'total' => $totales[0]["total"],
        ];

        array_push($tot, $totales);

        foreach($request->products as $product){
            $collect = collect($product);
            $cleanCollect = $collect->only('id', 'name', 'cant', 'description', 'price', 'subtotal');
            array_push($cad, $cleanCollect);
            Productquo::create([
                'quotation_id' => $quotation->id,
                'product_id' => $cleanCollect["id"],
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
        $data["fields"] = $request->fields;

        $pdf = PDF::loadView('quotes.pdf', compact('data'));

        Mail::send('emails.cotizaciones', $data, function($message)use($data, $pdf) {
            $message->to($data["email"], $data["email"])
                    ->subject($data["title"])
                    ->attachData($pdf->output(), "cotización.pdf");
        });

        // return $totales;
        return $request->fields[0];
    }

    public function list(){

        $quotes = Quotation::all();

        return view('quotes.show', compact('quotes'));
    }

    public function pdf(){
        return view('quotes.pdf');
    }
}
