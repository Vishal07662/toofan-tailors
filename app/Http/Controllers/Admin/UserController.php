<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index(Request $request)
    {
        $role = auth()->user()->role;
        $users = User::where('role', '>=', $role)->get();
        $userRoles = (new User)->getUsersRoles();

        return view('admin.users.index', [
            'pageTitle' => 'Users',
            'users' => $users,
            'userRoles' => $userRoles,
        ]);
    }

    public function create()
    {
        // @todo: to move this to a better place
        $userRoles = (new User)->getUsersRoles();
        $role = auth()->user()->role;
        $userRoles = array_filter($userRoles , function($key) use ($role) {
            return $key < $role ? false : true; 
        }, ARRAY_FILTER_USE_KEY);

        return view('admin.users.create', [
            'pageTitle' => 'Add new user',
            'userRoles' => $userRoles,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role' => 'sometimes|integer', // role is optional
            'phone' => ['sometimes', 'string', 'regex:/^\+?[0-9]{7,15}$/'],
        ]);

        $currentUser = $request->user(); // Authenticated user

        $role = User::USER_ROLE_CUSTOMER; // default role
        if ($request->has('role') && $currentUser && $currentUser->role <= $request->has('role')) {
            $role = $request->role;
        }

        // Create the user
        $userRequest = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $role,
        ];
        if ($request->has('phone')) {
            $userRequest['phone'] = $request->phone;
        }

        $user = User::create($userRequest);

        return redirect()->route('admin.users.index')
            ->with('success', 'User created successfully!!');
    }

    public function destroy(User $user)
    {
        $role = auth()->user()->role;
        if ($user->role < $role) {
            return back()->withErrors([
                'You do not have permission to delete this account'
            ]);
        } elseif ($user->id == auth()->user()->id) {
            return back()->withErrors([
                'You cannot delete your own account'
            ]);
        }

        $user->delete();
        
        return redirect()->route('admin.users.index')
            ->with('success', 'User deleted successfully!!');
    }

    public function show(User $user)
    {
        return view('admin.users.show', [
            'pageTitle' => 'Edit user',
            'user' => $user,
        ]); 
    }

    public function edit(User $user)
    {
        $userRoles = (new User)->getUsersRoles();
        $role = auth()->user()->role;
        $userRoles = array_filter($userRoles , function($key) use ($role) {
            return $key < $role ? false : true; 
        }, ARRAY_FILTER_USE_KEY);

        return view('admin.users.show', [
            'pageTitle' => 'Edit user',
            'user' => $user,
            'userRoles' => $userRoles,
        ]); 
    }
}
