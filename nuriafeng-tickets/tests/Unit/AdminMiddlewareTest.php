<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminMiddlewareTest extends TestCase
{
    use RefreshDatabase;

    public function test_middleware_allows_admin_users(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $this->actingAs($admin)
            ->get(route('admin.tickets'))
            ->assertOk();
    }

    public function test_middleware_blocks_non_admin_users(): void
    {
        $user = User::factory()->create(['is_admin' => false]);

        $this->actingAs($user)
            ->get(route('admin.tickets'))
            ->assertForbidden();
    }

    public function test_middleware_blocks_unauthenticated_users(): void
    {
        $this->get(route('admin.tickets'))
            ->assertRedirect(route('login'));
    }

    public function test_middleware_returns_403_status(): void
    {
        $user = User::factory()->create(['is_admin' => false]);

        $response = $this->actingAs($user)
            ->get(route('admin.tickets'));

        $this->assertEquals(403, $response->status());
    }
}
