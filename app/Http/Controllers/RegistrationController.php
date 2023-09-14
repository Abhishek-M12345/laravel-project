<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\Upload;

session(['key' => 'value']);

class RegistrationController extends Controller
{
    public function login()
    {
        return view('login');
    }
 //------------------------------------------------------------------
    public function authentication(Request $request)
    {
        $request-> validate([
            'email'=>'required | email',
            'password'=> 'required | min:3 |max:10'
        ]);

        $user = Registration::where('email', '=', $request->email)->first();
        if($user){
            if(Hash::check($request->password, $user->password))
            {
                return back()->with('success','successfully login !!');
                //return redirect('/dashboard');
            } else {
                 return back()->with('fail','This Password is not registered');
            }
        }
        else{
            return back()->with('fail','This email is not registered !!');
        }

    }
 //---------------------------------------------------------------

    public function showRegForm()
    {
        return view('new_registration');
    }

    public function store(Request $request)
    {
    //    echo "<pre>";
    //    print_r($request->all());
        $customer = new Registration;

        $customer->name = $request['name'];
        $customer->email = $request['email'];
        $customer->phone = $request['phone'];
        $customer->password =Hash::make($request['password']);
        $customer->con_password = Hash::make($request['confirmPassword']);
        $customer->save();
        
        return redirect('/');
    }

    public function showdata(Request $request)
    {
        $search = $request['search'] ?? "";

        if($search != "") {
            $customers = Registration::where('name', 'like', "$search%")->get();
        }
        else {
            $customers= Registration::paginate(15);
        }

       // $customers = Registration::all();
        $data= compact('customers', 'search');
        return view('view')->with($data);
    }

    public function delete($id)
    {
        $customer1 = Registration::find($id);
        if(!is_null($customer1))
        {
            $customer1->delete();
        }
        return redirect()->back();
    }

    public function edit($id)
    {
        $customer = Registration::find($id); 
        if(is_null($customer))
        {
            return redirect('/register/view/');
        }
        else
        {
            $data = compact('customer');
            return view('edit')->with($data);
        }
        
    }

    public function update($id, Request $request)
    {
        $customer = Registration::find($id); 
        $customer->name = $request['name'];
        $customer->email = $request['email'];
        $customer->phone = $request['phone'];

        $customer->save();
        return redirect('/register/view');
    }

    public function show(){

        return view('dashboard');
    }

    public function change_pwd(){
        return view('changepwd');
    }

    public function change_password(Request $request){
        
        $request-> validate([
            'currentPassword'=>'required',
            'newPassword'=> 'required | min:3 | max:8 '
        ]);

        $user = auth()->user();
        
        if(Hash::check($request->currentPassword, $user->password)){
            if($request->input('newPassword') == $request->input('confirmPassword')){

                $user->update([
                    'password' => Hash::make($request->newPassword),
                ]);
                return back()->with('success','Password change successfully !!');
            }
            else{
                return back()->with('fail','New password and Confirm password not match !!');
            }

        }
        else{
            return back()->with('fail','Please enter right password !!');
        }

    }
    

    public function uploads(Request $request){
       
        $fileName = time() . "-ws." . $request->file('image')->getClientOriginalExtension();
        echo $request->file('image')->storeAs('uploads',$fileName);

        $storeimage= new Upload();
        $storeimage->file_name = $fileName;
        $storeimage ->save();
    }


    public function registration(Request $request)
    {
        $customer1 = new Registration;

        $customer1->name = $request['name'];
        $customer1->email = $request['email'];
        $customer1->phone = $request['phone'];
        $customer1->password =Hash::make($request['password']);
        $customer1->con_password = Hash::make($request['confirmPassword']);
        $customer1->save();
        
        return redirect('/register/view');
    }
    
}