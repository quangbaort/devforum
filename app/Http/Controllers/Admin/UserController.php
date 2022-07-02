<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\User\{StoreRequest};
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
     * @return Response
     */
    public function create()
    {
        $roles = $this->roleRepository->all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
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
