<?php

namespace App\Http\Controllers\Wishlist;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Response;

class WishlistIndexController extends Controller
{
    public function __invoke(): Response
    {
        return response()
            ->view('wishlists.index', ['wishlists' => Wishlist::all()]);
    }
}
