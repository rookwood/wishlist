<?php

namespace App\Http\Controllers\Wishlists;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AddItemToWishlistController extends Controller
{
    public function __invoke(Wishlist $wishlist, Request $request): Response
    {
        $wishlist->items()->save(new Item($request->all()));

        return response()->view('wishlists.show', ['wishlist' => $wishlist]);
    }
}
