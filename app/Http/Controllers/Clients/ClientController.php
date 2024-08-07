<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function indexClient()
    {
        if (Auth::check()) {
            $client = User::where('id', Auth::user()->id)->first();
        }
        return view('clients.listClients', compact('client'));
    }
    //login
    public function loginClient()
    {
        return view('clients.loginClients');
    }
    public function postLoginClient(Request $request)
    {
        $data = $request->only('email', 'password');
        if (Auth::attempt($data)) {
            return redirect()->route('indexClient')->with('message', 'Đăng nhập thành công');
        } else {
            return redirect()->back()->with('errorLogin', 'Đăng nhập thất bại');
        }
    }
    // update
    public function updateClient(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        $data = $request->except('avatar'); //k nhận ảnh
        $old_image = $user->avatar; // giữ lại ảnh cũ
        // ng dùng k nhập ảnh mới
        $data['avatar'] = $old_image;
        // ng dùng nhập ảnh mới
        if ($request->hasFile('avatar')) {
            $path_image = $request->file('avatar')->store('image');
            $data['avatar'] = $path_image;
        }
        $user->update($data);
        // Xóa ảnh
        if ($request->hasFile('avatar')) {
            if (file_exists('storage/' . $old_image)) {
                unlink('storage/' . $old_image);
            }
        }
        return redirect()->back()->with('message', 'Cập nhật dữ liệu thành công');
    }
    //logout
    public function logoutClient()
    {
        Auth::logout();
        return redirect()->route('loginClient');
    }
    public function editPassword(Request $request, $id)
    {
        $client = User::where('id', $id)->first();
        return view('clients.editPassword', compact('client'));
    }
    public function updatePassword(Request $request,$id){
        $request->validate(['password' => 'required','confirmpassword'=>'required|same:password']);
        $client = User::where('id', $id)->first();
        $client->update(['password'=>$request->password]);
        return redirect()->route('indexClient')->with('message','Cập nhật thành công');
    }
}
