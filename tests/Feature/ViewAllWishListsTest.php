<?php

use App\Models\Wishlist;

describe('View all wishlists', function () {
    test('Show the main index list', function () {

        $wishlists = Wishlist::factory()->times(3)->create();

        $response = $this->get('/');

        $response->assertStatus(200);
        $wishlists->each(function ($wishlist) use ($response) {
            expect($wishlist->name)->not->toBeEmpty();
            $response->assertSee($wishlist->name);
            $response->assertSee(route('wishlist.show', $wishlist->id));
        });
    });

    test('Private lists are not shown to others', function () {
        $publicLists = Wishlist::factory()->times(3)->create();
        $privateList = Wishlist::factory()->private()->create();


        $response = $this->get('/');

        $publicLists->each(function ($wishlist) use ($response) {
            expect($wishlist->name)->not->toBeEmpty();
            $response->assertSee($wishlist->name);
            $response->assertSee(route('wishlist.show', $wishlist->id));
        });

        $response->assertDontSee($privateList->name);
        $response->assertDontSee(route('wishlist.show', $privateList->id));
    });
});
