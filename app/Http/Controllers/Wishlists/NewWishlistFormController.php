<?php

namespace App\Http\Controllers\Wishlists;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NewWishlistFormController extends Controller
{
    public function __invoke(): Response
    {
        return response()->view('wishlists.create');
    }
}
