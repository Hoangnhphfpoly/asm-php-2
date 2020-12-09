<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    private $mes = [
        'name.required' => 'Tên không được để trống',
        'email.required' => 'Email không được để trống',
        'email.unique' => 'Email đã tồn tại',
        'email.email' => 'Email không đúng đinh dạng',
        'password.required' => 'Pass không được để trống',
        'cf-pass.required' => 'Pass nhập lại không được để trống',
        'cf-pass.same' => 'Hãy nhập lại đúng password',
        'avatar.image' => 'Ảnh đại diện không đúng định dạng',
        'avatar.file' => 'Ảnh đại diện không được để trống'
    ];

    public function index(){
        $users = User::paginate(5);
        return view('user.index',compact('users'));
    }

    public function insertForm(){
        $roles = Role::where('status',1)->get();
        return view('user.insert', compact('roles'));
    }

    public function saveInsert(Request $request){
            $user = new User();

            $data = $request->validate([
                'name' => 'required',
                'email' => 'required|email:rfc,dns|unique:App\User',
                'password' => 'required',
                'cf-pass' => 'required|same:password',
                'avatar' => 'image|file',
            ], $this->mes);

            if (file_exists($request->file('avatar'))){
                $user->avatar = $request->file('avatar')->store('avatar','public');
            }

            $user->fill($request->all());
            $user->password = Hash::make($request->password);

            $user->save();
            return redirect()->route('user-index')->with('msg','Thêm mới tài khoản thành công');
    }

    public function delete($id){
        $userDel = User::findOrFail($id);

        if ($userDel->avatar != ""){
            unlink("storage/".$userDel->avatar);
        }

        $userDel->delete();
        return redirect()->route('user-index')->with('msg','Xóa thành công');
    }

    public function editForm($id){
        $roles = Role::where('status',1)->get();
        $userEdit = User::findOrFail($id);
        return view('user.edit', compact('roles','userEdit'));
    }

    public function saveEdit(Request $request){
        $userEdit = User::findOrFail($request->id);

        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email:rfc,dns|unique:App\User,email,'.$request->id,
            'avatar' => 'image|file',
        ], $this->mes);

        if (file_exists($request->file('avatar'))){
            if ($userEdit->avater != ""){
                unlink("storage/".$userEdit->avatar);
            }
            $userEdit->avatar = $request->file('avatar')->store('avatar','public');
        }

        $userEdit->fill($request->all());
        $userEdit->save();

        return redirect()->route('user-index')->with('msg','Sửa tài khoản thành công');
    }
}
