<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileEditRequest;
use App\User;
use App\UserDetail;
use Image;
use File;
use Hash;

class ProfileController extends Controller
{
    public function profile() {
    	$user_id = \Auth::user()->id;
    	$user = User::find($user_id);

    	return view('admin.profile.profile', compact('user'));
    }

    public function update(ProfileEditRequest $request) {
    	$user_id = \Auth::user()->id;
    	$user = User::find($user_id);

    	$data = $request->all();

   //  	UserDetail::where('user_id', $user_id)->update([
			// 'user_id' => $user_id,
   //  		'role' => $data['role'],
   //  		'bio' => $data['bio'],
   //  	]);
   //  	User::where('id', $user_id)->update([
   //  		'name' => $data['name'],
   //  	]);

    	if (request()->hasFile('avatar')) {
    		$avatar = request()->file('avatar');
    		$avatar_name = rand(111,99999).'.'.$avatar->getClientOriginalExtension();
    		$avatar_path = 'img/avatar/'.$avatar_name;

			Image::make($avatar)->save($avatar_path);

    		$delete_avatar_path = 'img/avatar/'.$user->detail->avatar;

    		File::delete($delete_avatar_path);
    	} else {
    		$avatar_name = $data['current_avatar'];
    	}

    	UserDetail::where('user_id', $user_id)->update([
    		'user_id' => $user_id,
    		'role' => $data['role'],
    		'bio' => $data['bio'],
    	]);

    	User::where('id', $user_id)->update([
    		'name' => $data['name'],
            'avatar' => $avatar_name,
    	]);
    	// echo "<pre>"; print_r($data); die;

    	return redirect()->back()->with('toast_success', 'Profil telah diubah');
    }

    public function updatePass(Request $request) {
        $data = $request->all();
        $old_password = User::where('id', \Auth::User()->id)->first();
        $current_password = $data['current_password'];

        if (Hash::check($current_password, $old_password->password)) {
            $new_password = bcrypt($data['new_password']);
            User::where('id', \Auth::User()->id) -> update(['password' => $new_password]);
            return redirect()->back()->with('toast_success', 'Password berhasil diganti');
        } else {
            return redirect()->back()->with('warning', 'Password sekarang salah');
        }
    }

    public function checkPass(Request $request) {
        $data = $request->all();
        $current_password = $data['current_password'];
        $user_id = \Auth::User()->id;
        $check_password = User::where('id', $user_id)->first();

        if (Hash::check($current_password, $check_password->password)) {
            echo "true"; die;
        } else {
            echo "false"; die;
        }
    }

    public function updateEmail() {

    }
}
