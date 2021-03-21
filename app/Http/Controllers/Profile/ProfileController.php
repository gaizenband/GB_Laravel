<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(){
        return view('admin.userList',['users'=>User::where('id', '!=', auth()->id())->paginate(5)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        return view('user.editProfile', [
            'user' => User::where('id', $id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param NewsRequest $request
     * @param News $news
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {

        parent::validateRequest($request);
        $user = User::where('id', $request->id)->first();
        $message = null;
        if($request->password_confirmation){
            if (Hash::check($request->post('password'), $user->password)){
                $user->fill([
                    'name' => $request->post('name'),
                    'password' => Hash::make($request->post('password_confirmation')),
                    'email' => $request->post('email')
                ])->save();
                $message = 'Профиль успешно изменен';
            }else{
                $message = 'Старый пароль введен не корректено';
                return redirect()->route('user.edit',['id'=>$user->id])->with('error', $message);

            }
        }else{
            $user->fill([
                'name' => $request->post('name'),
                'email' => $request->post('email')
            ])->save();
            $message = 'Профиль успешно изменен';
        }

        return redirect()->route('user.edit',['id'=>$user->id])->with('success', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $users
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index');

    }

    public function changeAdminStatus(Request $request){
        $status = User::select('isAdmin')->where('id', $request->id)->first();
        User::where('id', $request->id)->update(['isAdmin' => !$status->isAdmin]);
        return response()->json([
            'message' => "Статус пользователя $request->id изменен"
        ]);
    }


}
