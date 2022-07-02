<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ServiceInterface\UserServiceInterface;
use App\Services\ServiceInterface\PermissionServiceInterface;
use App\Http\Requests\User\{StoreRequest};
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;
use App\Repository\RoleRepositoryInterface;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    private $userService;
    private $permissionService;
    private $roleRepository;
    /**
    * userService constructor.
    *
    * @param UserService $userService
    */
    public function __construct(UserServiceInterface $userService, RoleRepositoryInterface $roleRepository)
    {
        $this->userService = $userService;
        $this->roleRepository = $roleRepository;
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
        $roles = $this->roleRepository->all();
        // return view with data
        return view('admin.users.index', compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = $this->roleRepository->all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $user = $this->userService->create($request->all());
        if($user && !$user->is_super_admin) {
            $this->userService->assignRoles($request->roles, $user);
        }
        return $user ? redirect()->route('admin.users.index')->with('success', 'Thêm mới thành công') :
        redirect()->route('admin.users.index')->with('error', 'Thêm mới thất bại')->withInput();
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
        ? redirect()->route('admin.users.index')->with('success', 'Xóa thành công')
        : redirect()->route('admin.users.index')->with('error', 'Xóa thất bại');
    }
}
