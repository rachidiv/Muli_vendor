<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Profile as ModelsProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Intl\Countries;
use Symfony\Component\Intl\Languages;

class Profile extends Controller
{
    public function edit(){
        $user = Auth::user();
        return view('dashboard.profile.edit',[
            'user'=>$user,
            'countries'=>Countries::getNames(),
            'locales' => Languages::getNames(),
        ]);
        // dd(Countries::getNames());
    }
    public function update(Request $request){
        $request->validate([
            'first_name' => ['required','string','max:255'],
            'last_name' => ['required','string','max:255'],
            'birthday' => ['nullable','date','before:today'],
            'gender' => ['in:male,female'],
            'country' => ['required','string','size:2'],
        ]);
        $user = $request->user();
        $profile = $user->Profile;
        $profile->fill($request->all())->save();
        return redirect()->route('dashboard.profile.edit')
        ->with('success','Profile updated');
        // if the profile exist fill will update it and if i dosnt it will create it 

        // if($profile->user_id){
        //     $profile->update($request->all());
        // }else{
        //     // $request->merge([
        //     //     'user_id' => $user->id,
        //     // ]);
        //     // ModelsProfile::create($request->all());
        //     $user->profile()->create($request->all());

        //     // user_id in profile will take id of user automatiqly 

        // }
    }
}