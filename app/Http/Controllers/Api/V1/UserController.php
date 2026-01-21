<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;

use App\Http\Resources\UserResource;

use App\Services\UserService;

use App\Http\Requests\StoreUserRequest;

use App\Http\Requests\UpdateUserRequest;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(
        private readonly UserService $userService
    ) {}

    public function index()
    {
        return UserResource::collection(
            $this->userService->getAll()
        );
    }

    public function store(StoreUserRequest $request)
    {
        $user = $this->userService->store($request->all());

        return new UserResource($user);
    }

    public function show(int $id)
    {
        return new UserResource(
            $this->userService->find($id)
        );
    }

    public function update(UpdateUserRequest $request, int $id)
    {
        $user = $this->userService->update($id, $request->all());

        return new UserResource($user);
    }

    public function destroy(int $id)
    {
        $this->userService->delete($id);

        return response()->json([
            'message' => 'User deleted successfully'
        ]);
    }
}
