<?php

use App\Models\User;
use App\Models\Wishlist;

describe('wishlist creation', function() {
    test('create a new wishlist for the current user', function() {
        $user = User::factory()->create();

        $this->actingAs($user)->post(route('wishlist.create'), ['name' => 'Test Wishlist']);

        $this->assertDatabaseHas('wishlists', ['name' => 'Test Wishlist']);
        $this->assertDatabaseHas('user_wishlist', [
            'user_id' => $user->id,
            'wishlist_id' => Wishlist::first()->id
        ]);
    });
});
