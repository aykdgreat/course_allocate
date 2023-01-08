<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CreateStaffRequest;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $staffs = User::orderBy('created_at', 'asc')->get();
        
        return view('admin.index', [
            'staffs' => $staffs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateStaffRequest $request)
    {
        $request->validated();

        $staff = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'othername' => $request->othername,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $staff->profile()->create([
            'user_id' => $staff->id,
            'title' => $request->title
        ]);

        $role = $request->set_admin == 'on' ? 'admin' : 'staff';

        $staff->role()->create([
            'user_id' => $staff->id,
            'role' => $role,
            'description' => 'This is the basic user role'
        ]);

        return redirect('/admin')->with('message', 'Staff Profile Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staff = User::find($id);

        return view('admin.edit', [
            'staff' => $staff
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $staff = User::where('id', $id);
        
        $staff->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'othername' => $request->othername,
            'email' => $request->email,
            // 'password' => Hash::make($request->password)
        ]);

        Profile::where('user_id', $id)->update([
            'title' => $request->title
        ]);

        $role = $request->set_admin == 'on' ? 'admin' : 'staff';

        Role::where('user_id', $id)->update([
            'role' => $role,
            'description' => 'This is the '.$role.' user role'
        ]);

        return redirect('/admin')->with('message', 'Staff Profile Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/admin')->with('message', 'Staff profile deleted!');
    }
}
