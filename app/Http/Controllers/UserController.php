<?php

namespace App\Http\Controllers;

use App\Article;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * user center -- index page
     *
     * @param $name
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($name)
    {
        $user = User::where('name', $name)->first()->toArray();

        return view('users.index', compact('user'));
    }

    public function allArticles($name)
    {
        $user = User::where('name', $name)->first();
        $articles = getUserArticles($user->id);

        return view('users.article', compact('articles'));
    }
}
