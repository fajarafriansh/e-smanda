<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\UserDetail;
use Image;
use File;

class ProfileController extends Controller
{
	protected function validator(array $data)
    {
        return Validator::make($data, [
            'avatar' => ['sometimes', 'image', 'mimes:jpg,jpeg,png,bmp,svg', 'max:5000'],
            'role' => ['required', 'string','max:255'],
            'bio' => ['required', 'string','max:255'],
        ]);
    }

    public function profile() {
    	$user_id = \Auth::user()->id;
    	$user = User::find($user_id);

    	return view('admin.profile.profile', compact('user'));
    }

    public function update(Request $request) {
    	if ($request->isMethod('post')) {
	    	$user_id = \Auth::user()->id;
	    	$user = User::find($user_id);
	    	$data = $request->all();

	    	if (request()->has('avatar')) {
	    		$avatar = request()->file('avatar');
	    		$avatar_name = rand(111,99999).'.'.$avatar->getClientOriginalExtension();
	    		$avatar_60x60_path = 'storage/avatar/60x60/'.$avatar_name;
	    		$avatar_70x70_path = 'storage/avatar/70x70/'.$avatar_name;
	    		$avatar_90x90_path = 'storage/avatar/90x90/'.$avatar_name;

	    		Image::make($avatar)->resize(60,60)->save($avatar_60x60_path);
				Image::make($avatar)->resize(70,70)->save($avatar_70x70_path);
				Image::make($avatar)->resize(90,90)->save($avatar_90x90_path);

				$delete_avatar_60x60_path = 'storage/avatar/60x60/'.$user->detail->avatar;
	    		$delete_avatar_70x70_path = 'storage/avatar/70x70/'.$user->detail->avatar;
	    		$delete_avatar_90x90_path = 'storage/avatar/90x90/'.$user->detail->avatar;

	    		File::delete($delete_avatar_60x60_path, $delete_avatar_70x70_path, $delete_avatar_90x90_path);
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
