<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Support\Facades\Crypt;
use Hash;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function deposite()
    {
        return view('deposite');
    }
    public function resend()
    {

    }

    public function details($id)
    {
        echo $id;
    }
    public function password_change()
    {
        return view('password_change');
    }
    public function update_password(Request $request)
    {
        $request -> validate([
            'current_password' => 'required',
            'password' => 'required|min:6|string|confirmed',
            'password_confirmation' => 'required'
        ]);

        $user= Auth::user();

        if (Hash::check($request->current_password, $user->password)){
            //--First Way
            // $user->password=Hash::make($request->password);
            // $user->save();
            //return redirect()->back()->with('success', 'Password Change Successfully');

            //--Second Way
            $data=array();
            $data['password']=Hash::make($request->password);
            DB::table('users')->where('id',Auth::id())->update($data);
            Auth::logout();
            return redirect()->route('login');

        }else{
            return redirect()->back()->with('error', 'Current Password Not Matched');
        }
    }
}
