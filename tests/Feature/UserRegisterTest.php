<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserRegisterTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreateUser()
    {
        $this->withoutExceptionHandling();
        
        $user = new User;
        $user->name = 'テストユーザー';
        $user->email = 'test@test.jp';
        $user->icon = 'https://ramenhiroba.s3-ap-northeast-1.amazonaws.com/icon/0CtX6fuJEYZxjafPxz1QcgXHzjjOrDl5plgTdT2w.jpg';
        $user->profile = 'テストユーザーです';
        $user->password = Hash::make('test1234');
        $user->save();
        
        // ユーザーがDBに登録されているかテスト
        $this->assertDatabaseHas('users', [
            'name' => $user->name,
            'email' => $user->email,
            'icon' => $user->icon,
            'profile' => $user->profile,
        ]);
        
        $readUser = User::where('name', 'テストユーザー')->first();
        $this->assertNotNull($readUser);
        
        // DBに登録されているパスワードと、テスト送信したパスワードを比較
        $this->assertTrue(Hash::check('test1234', $readUser->password));
    }
}