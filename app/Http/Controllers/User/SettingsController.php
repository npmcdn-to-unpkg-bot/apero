<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\User\UserBaseController;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\ZipCode;
use App\User;
use Hash;

class SettingsController extends UserBaseController
{

    public function getUpdate()
    {
        $user = User::with('user_zip')->findOrFail($this->user->id())->toArray();
        $user['user_country'] = Country::findOrFail($user['country']);
        $zips = ZipCode::all();
        $countries = Country::all();
        return response(['user' => $user, 'zips'=>$zips, 'countries' => $countries,'success' => 1]);
    }

    public function postUpdate(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'name' => 'required',
            'address' => 'required',
            'pobox' => 'required',
            'zip' => 'required',
            'city' => 'required',
            'country' => 'required',
            'email' => 'required|unique:users,email,' . $this->user->id() . ',id,is_user,1',
            'phone' => 'required',
            'mobile' => 'required',

        ]);

        if (User::findOrFail($this->user->id())->update($request->all()))
            return response()->json(['message' => "Your information successfully updated.", 'success' => 1]);
        return response()->json(['error' => "Something went wrong", 'success'=> 0]);

    }

    public function postChangePassword(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);

        if (Hash::check($request->old_password, $this->user->user()->password)) {
            User::findOrFail($this->user->id())->update(['password' => bcrypt($request->password)]);
            return response()->json(['message' => "Your password successfully changed.", 'success' => 1]);
        }

        return response()->json(['error' => "Something went wrong", 'success'=> 0]);
    }

}

