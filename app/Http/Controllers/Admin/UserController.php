<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ServiceInterface\UserServiceInterface;
use App\Services\ServiceInterface\PermissionServiceInterface;
class UserController extends Controller
{
    private $userService;

    private $permissionService;
    /**
    * userService constructor.
    *
    * @param UserService $userService
    */
    public function __construct(UserServiceInterface $userService, PermissionServiceInterface $permissionService)
    {
        $this->userService = $userService;
        $this->permissionService = $permissionService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // get user pagination
        $users = $this->userService->search($request);
        // get permission list for select
        $permissions = $this->permissionService->all();
        // return view with data
        return view('admins.user.index', compact('users', 'permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show( $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit( $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = $this->userService->delete($id);

        return $delete
        ? redirect()->route('admin.user.index')->with('success', 'Xóa thành công')
        : redirect()->route('admin.user.index')->with('error', 'Xóa thất bại');
    }
}
