<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function toggleBookmark($id): \Illuminate\Http\RedirectResponse
    {
        $user = auth()->user();

        if ($user->bookmarkedAds()->where('ad_id', $id)->exists()) {
            $user->bookmarkedAds()->detach($id);
            return back()->with('message', "O'chirildi");
        }else{
            $user->bookmarkedAds()->attach($id);
            return back()->with('message', "qoshildi");
        }
    }
    }
