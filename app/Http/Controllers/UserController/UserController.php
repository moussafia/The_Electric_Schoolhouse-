<?php

namespace App\Http\Controllers\UserController;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
class UserController extends Controller
{  
    public function __construct(){
    $this->middleware('authJWT');
    }
    public function updateProfile(Request $request){      
   
        $validateData=$request->validate([
        'first_name' => ['string','max:255', 'regex:/^[a-zA-Z]*$/'],
        'last_name' => ['string','max:255', 'regex:/^[a-zA-Z]*$/'],
        'email' =>  [
            'string',
            'email',
            'max:255',
            Rule::unique('users')->ignore($request->userID)],
         'old_password' => 'sometimes|nullable|string',
        'password_email' => 'sometimes|nullable|string',
        'password' => 'sometimes|nullable|string|confirmed',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]); 
     dd($validateData);
    $user = User::where('id',$request->userID)->first();
if ($request->filled('first_name')) {
    $user->first_name = $validateData['first_name'];
}

if ($request->filled('last_name')) {
    $user->last_name = $validateData['last_name'];
}

if ($request->filled('email')){
    if (Hash::check($validateData['password_email'], $user->password)) {
        $user->email = $validateData['email'];
        return redirect()->route('authPages.logIN')->withCookie(Cookie::forget('jwt_token'))->with('succes', 'Email updated successfully');
        } else {
            return redirect()->back()->with('error', 'Your old password is incorrect.');
        }
}
if ($request->filled('old_password')) {
    if (Hash::check($validateData['old_password'], $user->password)) {
        $user->password = Hash::make($validateData['password']);
        return redirect()->route('authPages.logIN')->withCookie(Cookie::forget('jwt_token'))->with('success', 'Password updated successfully');
    } else {
        return redirect()->back()->with('error', 'Your old password is incorrect.');
    }
} 

if ($request->hasFile('photo')) {
    $image = $request->file('photo');
    $destinationPath = 'assets/image/User/';
    $nameImage = date('YmdHis') .  $image->getClientOriginalName();
    $image->move($destinationPath, $nameImage);
    $user->photo = $nameImage;
}

if ($request->hasFile('cover')) {
    $image = $request->file('photo');
    $destinationPath = 'assets/image/User/';
    $coverName = date('YmdHis') .  $image->getClientOriginalName();
    $image->move($destinationPath, $coverName);
    $user->cover = $coverName;
}
$user->save();

return redirect()->route('profileView')->with('success', 'Profile updated successfully.');
}
public function deleteProfile(Request $request){
    $validateData=$request->validate([
         'password_delete' => 'required|nullable|string',
    ]);  
    $user = User::where('id',$request->userID)->first();
    if(Hash::check($validateData['password_delete'], $user->password)){
       $user->destroy($request->userID);
        return redirect()->route('welcome');
    }else{
        return redirect()->route('profileView')->with('error', 'password not match.');

    }
}
}
