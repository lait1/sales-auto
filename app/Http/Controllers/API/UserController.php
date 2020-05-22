<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\ValidationException;
use Log;

class UserController extends Controller
{
    public function index()
    {
        $result = [];
        $users = User::all();
        foreach ($users as $i => $user) {
            $result[$i]['role'] = $user->role;
            $result[$i] = $user->toArray();
        }
        return $result;

    }

    /**
     * @param Request $request
     * @return mixed
     * @throws ValidationException
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'role_id' => 'required',
            'login' => 'required|unique:users',
        ]);

        try {
            $user = User::create($request->all());
            $user->setRole($request->get('role_id'));
            $user->setBlock($request->get('blocked'));
            return $user;
//
        } catch (\Throwable $e) {
            Log::error('Ошибка сохранения пользователя', (array)$e->getMessage());
            return response()->json('Ошибка сохранения', 404);
        }

    }

    public function edit(User $user)
    {
        return $user;
    }

    /**
     * @param Request $request
     * @param User $user
     * @return User|\Illuminate\Http\JsonResponse
     * @throws ValidationException
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'login' => 'required',
        ]);
        try {
            $user->update($request->all());
            $user->setRole($request->get('role_id'));
            $user->setBlock($request->get('blocked'));
            return $user;
        } catch (\Throwable $e) {
            Log::error('Ошибка обновления пользователя', $e->getMessage());
            return response()->json('Ошибка обновления', 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client $client
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            return response()->json('User deleted');
        } catch (\Throwable $e) {
            Log::error('Ошибка удаления пользователя', $e->getMessage());
            return response()->json('Ошибка удаления', 404);
        }
    }

    public function blocked($id)
    {
        $user = User::findOrFail($id);
        $user->toggleStatus();
        return response()->json($user->blocked);
    }

}
