<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\Interfaces\UserServiceInterface as UserService;
use App\Repositories\Interfaces\ProvinceRepositoryInterface as ProvinceService;

use App\Http\Requests\StoreUserRequest;

use Illuminate\Support\Facades\Config;


class UserController extends Controller
{

    protected $userService;
    protected $provinceReponsitory;
    public function __construct(
        UserService $userService,
        ProvinceService $provinceReponsitory

    ) {
        $this->userService = $userService;
        $this->provinceReponsitory = $provinceReponsitory;
    }

    public function index()
    {
        $users = $this->userService->paginate();
        return view('user.index', compact(
            'users'
        ));
    }

    public function create(Request $request)
    {
        $provinces = $this->provinceReponsitory->all($request);
        return view('user.create', compact(
            'provinces',
        ));
    }

    public function store(StoreUserRequest $request)
    {
        if ($this->userService->create($request)) {
            return redirect()->route('user.index')->with('success', 'Thêm mới người dùng thành công');
        }
        return redirect()->route('user.index')->with('error', 'Thêm mới người dùng không thành công, Hãy thủ lại !!');
    }
}
