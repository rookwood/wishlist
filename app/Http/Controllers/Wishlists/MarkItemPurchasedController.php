<?php

namespace App\Http\Controllers\Wishlists;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class MarkItemPurchasedController extends Controller
{
    public function __invoke(Item $item)
    {
        $item->markPurchased(Auth::user());

        return redirect()->back();
    }
}
