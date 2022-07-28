<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->has('search') ? $request->get('search') : null;
        $users = User::query()
            ->when($request->has('search'), function ($query, $search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->orderBy('id', 'desc')
            // ->withQueryString()
            ->paginate(config('site.pagination.limit'))
            ->through(function ($item) {
                return [
                    'id' => $item->id,
                    'uuid' => $item->uuid,
                    'name' => $item->name,
                    'email' => $item->email
                ];
            });
        return Inertia::render('Users/Index', [
            'users' => $users
        ]);
    }

    public function create($user = null)
    {
        $user = User::whereUuid($user)->first();
        return Inertia::render('Users/Create', [
            'editUser' => (!empty($user)) ?
            $user->only(['name', 'email', 'uuid', 'id'])
            : null
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:64',
            'email' => 'required|max:255|unique:users,email',
        ]);

        $validated['password'] = Hash::make(Str::random(10));
        User::create($validated);
        return redirect()->route('user.index');
    }

    public function update(Request $request, $user)
    {
        $user = User::whereUuid($user)->first();

        if (empty($user)) {
            return redirect()->route('user.index');
        }
        $validated = $request->validate([
            'name' => 'required|max:64',
            'email' => 'required|max:255|unique:users,email,'.$user->id,
        ]);
        $user->update($validated);
        return redirect()->route('user.index');
    }

    public function delete(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('message.success', 'User deleted successfully.');
    }
}
