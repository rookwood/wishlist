<?php

use App\Models\Wishlist;

describe('view all wishlists', function () {
    test('show the main index list', function () {

        $wishlists = Wishlist::factory()->times(3)->create();

        $response = $this->get('/');

        $response->assertStatus(200);
        $wishlists->each(function ($wishlist) use ($response) {
            expect($wishlist->name)->not->toBeEmpty();
            $response->assertSee($wishlist->name);
        });
    });
});
