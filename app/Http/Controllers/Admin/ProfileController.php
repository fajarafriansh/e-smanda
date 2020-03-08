<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileEditRequest;
use App\User;
use App\UserDetail;
use Image;
use File;

class ProfileController extends Controller
{
    public function profile() {
    	$user_id = \Auth::user()->id;
    	$user = User::find($user_id);

    	return view('admin.profile.profile', compact('user'));
    }

    public function update(ProfileEditRequest $request) {
    	if ($request->isMethod('post')) {
	    	$user_id = \Auth::user()->id;
	    	$user = User::find($user_id);
	    	$data = $request->all();

	    	if (request()->has('avatar')) {
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
	    		'avatar' => $avatar_name,
	    		'role' => $data['role'],
	    		'bio' => $data['bio'],
	    	]);

	    	User::where('id', $user_id)->update([
	    		'name' => $data['name'],
	    	]);
	    	// echo "<pre>"; print_r($data); die;

	    	return redirect()->back()->with('toast_success', 'Profil berhasil diubah.');
	    }
    }

    public function updatePass() {

    }
}
