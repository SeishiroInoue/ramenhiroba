<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::withCount('reviews')->orderBy('id', 'desc')->paginate(10);
        return view('users.index', [
            'users' => $users,
        ]);
    }
    
    public function show($id)
    {
        $user = User::findOrFail($id);
        $user->loadRelationshipCounts();
        $reviews = $user->reviews()->withCount('favorite_users')->withCount('comment_users')->orderBy('created_at', 'desc')->paginate(10);
        
        return view('users.show', [
            'user' => $user,
            'reviews' =>$reviews,
        ]);
    }
    
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', [
            'user' => $user, 
        ]);
    }
    
    public function editPassword()
    {
        $user = Auth::user();
        return view('profile.editPassword', [
            'user' => $user, 
        ]);
    }
    
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|string|email|max:255|unique:users,email,'.\Auth::id().',id',
            'password' => ['required', 'confirmed', function ($attribute, $value, $fail) {
                    if (!Hash::check($value, Auth::user()->password)) {
                        $fail('パスワードが違います');
                    }
                }
            ],
            'profile' => 'string|max:150',
            'icon' => 'image|max:5120',
        ]);
        
        $user = User::findOrFail(Auth::id());
        $user->name = $request->name;
        $user->email = $request->email;
        $user->profile = $request->profile;
        if ($request->icon) {
            $file = $request->icon;
            $path = Storage::disk('s3')->putFile('/icon', $file, 'public');
            $url = Storage::disk('s3')->url($path);
            $user->icon = $url;
        }
        
        $user->save();
        
        return redirect('/');
    }
    
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', function ($attribute, $value, $fail) {
                    if (!Hash::check($value, Auth::user()->password)) {
                        $fail('現在のパスワードが違います');
                    }
                }
            ],
            'new_password' => 'required|string|min:8|confirmed',
        ]);
        
        $user = User::findOrFail(Auth::id());
        $user->password = Hash::make($request['new_password']);
        $user->save();
        
        return redirect('/');
    }
    
    public function delete_confirm()
    {
        $user = Auth::user();
        return view('users.delete_confirm');
    }
    
    public function destroy()
    {
        $user = User::findOrFail(Auth::id());
        if (Auth::id() !== 1) {
            $user->delete();
        }

        return redirect('/');
    }
    
    public function followings($id)
    {
        $user = User::findOrFail($id);
        $user->loadRelationshipCounts();
        $followings = $user->followings()->withCount('reviews')->paginate(10);

        return view('users.followings', [
            'user' => $user,
            'users' => $followings,
        ]);
    }
    
    public function followers($id)
    {
        $user = User::findOrFail($id);
        $user->loadRelationshipCounts();
        $followers = $user->followers()->withCount('reviews')->paginate(10);

        return view('users.followers', [
            'user' => $user,
            'users' => $followers,
        ]);
    }
    
    public function favorites($id)
    {
        $user = User::findOrFail($id);
        $user->loadRelationshipCounts();
        $favorites = $user->favorites()->withCount('favorite_users')->withCount('comment_users')->paginate(10);
    
        return view('users.favorites', [
            'user' => $user,
            'reviews' => $favorites,  
        ]);
    } 
}
