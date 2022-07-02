<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\ServiceInterface\PermissionServiceInterface;
use App\Services\ServiceInterface\UserServiceInterface;
use App\Services\UserService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    private $userService;

    private $permissionService;

    /**
     * userService constructor.
     *
     * @param UserService $userService
     * @param PermissionServiceInterface $permissionService
     */
    public function __construct(UserServiceInterface $userService, PermissionServiceInterface $permissionService)
    {
        $this->userService = $userService;
        $this->permissionService = $permissionService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index(Request $request)
    {
        // get user pagination
        $users = $this->userService->search($request);
        // get permission list for select
        $permissions = $this->permissionService->all();
        // return view with data
        return view('admin.users.index', compact('users', 'permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $delete = $this->userService->delete($id);

        return $delete
            ? redirect()->route('admin.users.index')->with('success', 'Xóa thành công')
            : redirect()->route('admin.users.index')->with('error', 'Xóa thất bại');
    }
}
