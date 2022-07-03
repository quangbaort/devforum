<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Repository\RoleRepositoryInterface;
use App\Services\ServiceInterface\UserServiceInterface;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    private $userService;
    private $permissionService;
    private $roleRepository;

    /**
     * userService constructor.
     *
     * @param UserServiceInterface $userService
     * @param RoleRepositoryInterface $roleRepository
     */
    public function __construct(UserServiceInterface $userService, RoleRepositoryInterface $roleRepository)
    {
        $this->userService = $userService;
        $this->roleRepository = $roleRepository;
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
        $roles = $this->roleRepository->all();
        // return view with data
        return view('admin.users.index', compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Renderable
     */
    public function create()
    {
        $roles = $this->roleRepository->all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return RedirectResponse
     */
    public function store(UserRequest $request)
    {
        $user = $this->userService->create($request->all());
        if ($user && !$user->is_super_admin) {
            $this->userService->assignRoles($request->roles, $user);
        }
        return $user ? redirect()->route('admin.users.index')->with('success', 'Thêm mới thành công') :
            redirect()->route('admin.users.index')->with('error', 'Thêm mới thất bại')->withInput();
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
     * @param $userID
     * @return Renderable
     */
    public function edit($userID)
    {
        $roles = $this->roleRepository->all();
        $user = $this->userService->find($userID);
        $userRoleId = $user->roles->pluck('id')->toArray();

        return view('admin.users.edit', compact('roles', 'user', 'userRoleId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param $userID
     * @return RedirectResponse
     */
    public function update(UserRequest $request, $userID)
    {
        $user = $this->userService->find($userID);
        $updated = $user->update($request->filled('password') ? $request->validated() : $request->except('password'));
        if ($updated) {
            $this->userService->syncRoleUser($request->roles ?? [], $user);
        }

        return $updated ? redirect()->route('admin.users.index')->with('success', 'Thay đổi thành công') :
            redirect()->route('admin.users.index')->with('error', 'Thay đổi thất bại')->withInput();
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
