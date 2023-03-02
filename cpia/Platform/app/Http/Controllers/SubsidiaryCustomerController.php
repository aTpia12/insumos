<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Subsidiary;
use Illuminate\Http\Request;

class SubsidiaryCustomerController extends Controller
{
    public function __invoke(Customer $customer)
    {
        $subsidiaries = Subsidiary::all();

        return view('subsidiaries.index', compact('subsidiaries', 'customer'));
    }
}
