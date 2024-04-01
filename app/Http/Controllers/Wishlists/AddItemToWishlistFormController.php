<?php

namespace App\Http\Controllers\Wishlists;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class AddItemToWishlistFormController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Wishlist $wishlist, Request $request)
    {
        return response()->view('items.create', ['wishlist' => $wishlist]);
    }
}
