<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function indexAdmin(){
       $data = User::all();
       return view('auth.listAuth',compact('data'));
    }
    // login
    public function loginAdmin(){
        return view('auth.login');
    }
    public function postLoginAdmin(Request $request){
         $data = $request->only('email','password');
         // kiểm tra xem tk có trong csdl ko
         if(Auth::attempt($data)){
            return redirect()->route('indexAdmin')->with('message','Đăng nhập thành công');
         }else {
            return redirect()->back()->with('errorLogin','Đăng nhập thất bại');
         }
    }
    // Register
    public function registerAdmin(){
        return view('auth.register');
    }
    public function postRegisterAdmin(Request $request){
        $data = $request->except('avatar');
        $data['avatar'] = "";
        // Kiểm tra file
        if ($request->hasFile('avatar')) {
            $path_image = $request->file('avatar')->store('image');
            $data['avatar'] = $path_image;
        }
        User::query()->create($data);
        return redirect()->back()->with('message','Đăng kí tài khoản thành công');
    }
    // logout
    public function logoutAdmin(){
        Auth::logout();
        return redirect()->route('loginAdmin');
    }
    //active
    public function active($id){
        $active = User::where('id',$id)->first();
        if($active->role == 'admin'){
            return back()->with('message','Không thể ngừng kích hoạt tài khoản admin');
        } else {
            if($active->active==1){
                $active->update(['active'=>0]);
           } else {
               $active->update(['active'=>1]);
           }
           return redirect()->back();
        }
        
    }
}
