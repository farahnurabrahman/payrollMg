<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6'
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password) // ✅ Encrypt here
    ]);

    return redirect()->route('login')->with('success', 'Account created!');
    }

    public function show(User $users)
    {
        return view('users.show', compact('users'));
    }

    public function edit($id) {
    $user = User::findOrFail($id);
    return view('users.edit', compact('user')); // Sending $user to Blade
}
    public function update(Request $request, Users $user, $id)
    {
        $request->validate([
            'name' => 'required|unique:users,name,' . $id,
        ]);
        
        $user = User::findOrFail($id);

        $input = $request->all();
        $user->update($input);
        return redirect()->route('users.index')
            ->with('success','Users updated successfully.');
    }

    public function destroy(User $users)
    {
        $users->delete();
        return redirect()->route('users.index')
            ->with('success','User deleted successfully');
    }
}