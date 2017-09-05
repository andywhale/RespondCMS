<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function __construct() {
      $this->middleware('guest', ['except' => 'destroy']);
    }

    public function create() {
      return view('session.create');
    }

    public function store() {
      if (!auth()->attempt(request(['email', 'password']))) {
        return back()->withErrors(['message' => 'Username and password do not match please check and try again']);
      }
      return redirect('/admin');
    }

    public function destroy() {
      auth()->logout();
      return redirect('/');
    }
}
