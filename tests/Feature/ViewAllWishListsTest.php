<?php

use App\Models\Item;
use App\Models\User;
use App\Models\Wishlist;

describe('View all wishlists', function () {
    test('Show the main index list', function () {

        $wishlists = Wishlist::factory()->has(User::factory())->times(3)->create();

        $response = $this->actingAs(User::factory()->create())->get('/');

        $response->assertStatus(200);
        $wishlists->each(function ($wishlist) use ($response) {
            expect($wishlist->name)->not->toBeEmpty();
            $response->assertSee($wishlist->name);
            $response->assertSee(route('wishlist.show', $wishlist->id));
        });
    });

    test('Private lists are not shown to others', function () {
        $publicLists = Wishlist::factory()
            ->has(User::factory())
            ->has(Item::factory())
            ->times(3)->create();

        $privateList = Wishlist::factory()
            ->has(User::Factory())
            ->has(Item::factory())
            ->private()->create();


        $response = $this->actingAs(User::factory()->create())->get('/');

        $publicLists->each(function ($wishlist) use ($response) {
            expect($wishlist->name)->not->toBeEmpty();
            $response->assertSee($wishlist->name);
            $response->assertSee(route('wishlist.show', $wishlist->id));
        });

        $response->assertDontSee($privateList->name);
        $response->assertDontSee(route('wishlist.show', $privateList->id));
    });

    test('Authentication is required to view lists', function() {
        $response = $this->get('/');
        $response->assertRedirect(route('login'));
    });
});
