<?php

use App\Models\Item;
use App\Models\User;

describe('Purchase tracking for wishlist items', function () {
    test('items can have purchased status', function () {
        $user = User::factory()->create();
        $item = Item::factory()->create();

        expect($item->quantityPurchased())->toBe(0);

        $item->markPurchased($user);

        expect($item->fresh()->quantityPurchased())->toBe(1);

        $this->assertDatabaseHas('purchases', ['user_id' => $user->id, 'item_id' => $item->id]);
    });

    test('Items can be marked as purchased by other users', function () {
        $user = User::factory()->create();
        $item = Item::factory()->create();

        expect($item->quantityPurchased())->toBe(0);

        $this->actingAs($user)
            ->post(route('purchases.create', $item->id));

        expect($item->fresh()->quantityPurchased())->toBe(1);

        $this->assertDatabaseHas('purchases', ['user_id' => $user->id, 'item_id' => $item->id]);
    });

    test('A user cannot see items that have been purchased from their own list', function () {
        $user = User::factory()->create();
        $wishlist = \App\Models\Wishlist::factory()->has(Item::factory()->state(['quantity' => 2]))->create();
        $item = Item::first();

        $item->markPurchased(User::factory()->create());

        $response = $this->actingAs($user)
            ->get(route('wishlist.show', $wishlist));

        $response->assertOk();
        $response->assertSee('Requested</span> 2</span>', false);
    });
});
