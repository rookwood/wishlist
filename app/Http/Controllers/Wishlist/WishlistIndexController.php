<?php

namespace App\Http\Controllers\Wishlist;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class WishlistIndexController extends Controller
{
    public function __invoke(): Response
    {
        $user = Auth::user() ?: new User;
        $lists = Wishlist::all()->filter(function (Wishlist $list) use ($user) {
            return $list->isVisibleTo($user);
        });

        return response()
            ->view('wishlists.index', ['wishlists' => $lists]);
    }
}
