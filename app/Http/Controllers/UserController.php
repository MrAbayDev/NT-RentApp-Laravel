<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function toggleBookmark($id): \Illuminate\Http\RedirectResponse
    {
        $user = auth()->user();

        if ($user->bookmarks()->where('ad_id', $id)->exists()) {
            $user->bookmarks()->detach($id);
            return back()->with('message', "O'chirildi");
        }else{
            $user->bookmarks()->attach($id);
            return back()->with('message', "qoshildi");
        }
    }
    }
