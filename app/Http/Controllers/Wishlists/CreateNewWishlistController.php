<?php

namespace App\Http\Controllers\Wishlists;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class CreateNewWishlistController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $wishlist = Wishlist::createFromRequest($request);

        return response()->view('wishlists.show', ['wishlist' => $wishlist]);
    }
}
