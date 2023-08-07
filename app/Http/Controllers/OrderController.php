<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function showForm(): View
    {
        return view('orders.order_form');
    }

    public function processForm(Request $request): mixed
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'information' => 'required|string',
        ]);

        $dataToSave = [
            'name' => $validatedData['name'],
            'phone' => $validatedData['phone'],
            'email' => $validatedData['email'],
            'information' => $validatedData['information'],
        ];

        $order = new Order($dataToSave);

        if($order->save()) {
            Storage::append('orders.txt', json_encode($dataToSave));
            return view('orders.order-confirmation');
        }

        return back()->with('error', 'Failed to add entry');
    }
}
