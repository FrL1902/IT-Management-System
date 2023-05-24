<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\Console\Input\Input;

class UserController extends Controller
{
    public function new_user_page()
    {
        return view('admin.newUser');
    }

    public function manage_user_page()
    {
        $user = User::all();

        return view('admin.manageUser', compact('user'));
    }

    // public function update(Request $request)
    // {

    //     dd($request->userIdHidden);
    // }

    public function makeUser(Request $request)
    {

        $request->validate([
            'usernameform' => 'required|unique:App\Models\User,name|min:4|max:16',
            'emailform' => 'required|unique:App\Models\User,email',
            'passwordform' => 'required|min:6|max:20'
        ]);

        $account = new User();
        $account->name = $request->usernameform;
        $account->email = $request->emailform;
        $account->level = $request->optionsRadios;
        $account->password = Hash::make($request->passwordform);

        $account->save();

        $userAdded = $request->usernameform . " [" . $request->optionsRadios . "] " . "berhasil di tambahkan";
        $request->session()->flash('sukses_add', $userAdded);

        return redirect()->back();

        // return $request->input();
    }

    public function destroy($id)
    {
        $user = User::find($id);

        $deletedUser = $user->name;

        $user->delete();

        $userDeleted = "User" . " \"" . $deletedUser . "\" " . "berhasil di hapus";

        session()->flash('sukses_delete', $userDeleted);

        return redirect('manageUser');
    }


    public function tex(Request $request)
    {
        $userInfo = User::where('id', $request->userIdHidden)->first();
        $oldUsername = $userInfo->name;

        $request->validate([
            'usernameformupdate' => 'required|unique:App\Models\User,name|min:4|max:16',
        ]);

        User::where('id',$request->userIdHidden)->update([
            'name' => $request->usernameformupdate,
        ]);

        $request->session()->flash('sukses_editUser', $oldUsername);

        return redirect('manageUser');
    }
}
