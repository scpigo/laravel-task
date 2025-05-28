<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Good;
use App\Services\OrderService;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        return view('site.index', [
            'goodsList' => Good::getGoodsForList()
        ]);
    }

    public function createOrder(OrderRequest $request)
    {
        $data = $request->getData();

        OrderService::createOrder($data);

        return redirect(route('site.thankyou'));
    }

    public function getPrice(Request $request)
    {
        if ($request->ajax()) {
            $price = Good::query()->find($request->post('good_id'))->price;
            $quantity = $request->post('quantity');

            return response()->json(['price' => round($price * $quantity, 2)]);
        }
        return response()->json([], 400);
    }
}
