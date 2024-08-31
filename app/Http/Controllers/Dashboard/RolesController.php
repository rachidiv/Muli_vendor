<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Role;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class RolesController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->authorizeResource(Role::class, 'role');    

    }

    public function index()
    {
        $roles = Role::paginate();
        return view('dashboard.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.roles.create',[
            'role'=>new Role()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'abilities' => 'required|array'
        ]);
        $role = Role::createWithAbilities($request);
        return redirect()
        ->route('dashboard.roles.index')
        ->with(
            'success' , 'Role updated successfully'
        );
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $role_abilities = $role->abilities()->pluck('type','ability')->toArray();
        return view('dashboard.roles.edit',compact('role','role_abilities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'abilities' => 'required|array'
        ]);
        $role->updateWithAbilities($request);
        return redirect()
        ->route('dashboard.roles.index')
        ->with(
            'success' , 'Role updated successfully'
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}