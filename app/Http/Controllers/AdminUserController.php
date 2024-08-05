<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminUserController;

class AdminUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'is_active' => 'required|boolean',
        ]);

        $user->is_active = $request->input('is_active');
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'Les informations de l\'utilisateur ont été mises à jour.');
    }

    public function destroy($id)
    {
        dd('user supprime');
        User::destroy($id);
    
        return redirect()->route('admin.users.index');
    }
    


}
