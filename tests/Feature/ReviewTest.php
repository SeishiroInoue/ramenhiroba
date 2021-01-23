<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Review;

class ReviewTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * A basic feature test example.
     *
     * @return void
     */
    
    # レビュー一覧表示機能テスト
    
    // 未ログイン時
    public function testGuestIndex()
    {
        $response = $this->get(route('welcome'));
        
        $response->assertStatus(200)
        ->assertViewIs('welcome')
        ->assertSee('新規登録')
        ->assertSee('ログイン')
        ->assertSee('レビューする');
    }
    
    // ログイン時
    public function testAuthIndex()
    {
        $user = factory(User::class)->create();
        
        $response = $this->actingAs($user)->get(route('welcome'));
        
         $response->assertStatus(200)
        ->assertViewIs('welcome')
        ->assertSee('ランキング')
        ->assertSee('ユーザー')
        ->assertSee($user->name)
        ->assertSee('レビューする');
    }
    
    #投稿画面表示テスト
    
    // 未ログイン時
    public function testGuestCreate()
    {
        $response = $this->get(route('reviews.form'));

        $response->assertRedirect('login');
    }
    
    // ログイン時
    public function testAuthCreate()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
        ->get(route('reviews.form'));

        $response->assertStatus(200)
        ->assertViewIs('reviews.form');
    }
}
