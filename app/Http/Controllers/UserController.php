<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index', [
            'users' => User::paginate(6)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:users,name'],
            'email' => ['required', 'string', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:5', 'max:255'],
        ]);

        if (User::create($credentials)) {
            if (!Auth::check()) return UserController::auth($request);
            if (Auth::user()->admin) return redirect()->route('user.index')->with('msg', ['success', 'User Creation Success!']);
            return redirect()->route('home')->with('msg', ['warning', 'User successfully inserted but the user already logged in!']);
        }
        return redirect()->route('user.index')->with('msg', ['danger', 'User Creation Failed!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('user.show', [
            'user' => User::findorfail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('user.form', [
            'user' => User::findorfail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $credentials = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:users,name'],
            'email' => ['required', 'string', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:5', 'max:255'],
        ]);

        $user = User::findorfail($id);
        $user->fill($credentials);

        if ($user->save()) {
            if ($user->id == Auth::user()->id) return UserController::logout($request);
            return redirect()->route('user.index')->with('msg', ['success', 'User Successfully Edited!']);
        }
        return redirect()->route('user.index')->with('msg', ['success', 'User Failed to Edit!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if (User::destroy($id)) {
            if (Auth::user()->id == $id) return UserController::logout($request);
            return redirect()->route('user.index')->with('msg', ['success', 'User Deletion Success!']);
        }
        return redirect()->route('user.index')->with('msg', ['danger', 'User Deletion Failed!']);
    }

    function login()
    {
        return view('user.login');
    }

    static function auth(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'string', 'max:255']
        ]);

        if (Auth::attempt($credentials)) {
            if (Auth::user()->admin) return redirect()->route('admin.post.list');
            return redirect()->route('home');
        }
        return redirect()->route('login')->with('msg', ['danger', 'Wrong Password or Username!']);
    }

    static function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect()->route('login');
    }
}
