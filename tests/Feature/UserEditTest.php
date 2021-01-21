<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class UserEditTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * A basic feature test example.
     *
     * @return void
     */
     
    # ユーザープロフィール編集画面表示テスト
    
    // 未ログイン時
    public function testGuestEdit()
    {
        $user = factory(User::class)->create();
        
        $response = $this->get(route('profile.edit', ['name' => $user->name]));
        $response->assertRedirect(route('login'));
    }
    
    // ログイン時
    public function testAuthEdit()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get(route('profile.edit', ['name' => $user->name]));

        $response->assertStatus(200)->assertViewIs('profile.edit');
    }
}
