<?php

namespace App\Http\Controllers\Wishlists;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RemoveItemFromWishlistController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Item $item)
    {
        $item->delete();

        return redirect()->back();
    }
}
