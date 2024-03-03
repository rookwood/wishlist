<?php

namespace App\Http\Controllers\Wishlist;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;

class ShowWishListController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Wishlist $wishlist)
    {
        return response()->view('wishlists.show', ['wishlist' => $wishlist]);
    }
}
