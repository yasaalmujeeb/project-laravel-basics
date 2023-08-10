<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// for password hashing 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class UserController extends Controller
{
    public function register(Request $req)
    {
        // check that all the fields are set or not
        if (!isset($req->name) || !isset($req->email) || !isset($req->password)) {
            return back()->withErrors([
                'error' => 'Please enter your email, name, and password to register.',
            ]);
        }
        if($req->password == $req->confirmpassword)
        { 
        $hashedPassword = Hash::make($req->password);
        $insert = DB::table('users')->insert([
             'name'=>$req->name,
             'email'=>$req->email,
             'password'=>$hashedPassword,
             'created_at'=>now(),
             'updated_at'=>now()
        ]);
        if($insert)
        {
            return redirect('/login');
        }
        else{
            return back()->withErrors([
                'error'=>'Error in inserting as your information can contain some error',
            ]);
        }
    }
    else
    {
        return back()->withErrors([
            'cpassword'=>'the password and confirm password not matched',
        ]);
    }
    }

    public function login(Request $req)
    {
        if (!isset($req->email) || !isset($req->password)) {
            return back()->withErrors([
                'error' => 'Please enter your email and password to login',
            ]);
        }
        $check = User::where('email', $req->email)->first();
        if($check && Hash::check($req->password,$check->password))
        {
            Session::put('userId',$check->id);
            Session::put('userName',$check->Name);
            return redirect('/blog');
        }
        else
        {
            return back()->withErrors([
                'error'=>'You are not a registered user according to the provided information.',
            ]);
        }
    }

    public function logout()
   {
    session()->flush();
    return redirect('/login');
   }
   
   public function adminAuth(Request $req)
   {
    $admin = 'admin@gmail.com';
    $password = 'adminpassword';
    if($req->email == $admin && $req->password == $password)
    {
        Session::put('adminId',$admin);
        return redirect()->route('admin.page');
    }
    else
    {
        echo "<h1>You are not an admin.</h1>";
    }
   }

   public function adminlogout()
   {
    session()->forget('adminId');
    return view('welcome');
   }

   public function admin()
   {
      $user = User::all();
      return view('adminpage',compact('user'));
   }
   public function deleteuser($id)
   {
    $user = User::find($id);
    $user->delete();
    if($user)
    {
        if(session('userId')==$id)
        {
        session()->forget('userId');
        return redirect()->back();
        }
        return redirect()->back();
    }
    return back()->withErrors([
        'error'=>'error in deleting the user',
    ]);

   }
}
