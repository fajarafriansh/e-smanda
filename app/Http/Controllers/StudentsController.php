<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\StudentDetail;
use Image;
use Hash;

class StudentsController extends Controller
{
    public function editProfile() {
    	$student_id = \Auth::user()->id;
    	$student = User::find($student_id);

    	return view('user.edit', compact('student'));
    }

    public function updateProfile(Request $request) {
    	$user_id = \Auth::user()->id;
    	$user = User::find($user_id);
    	$user_count = StudentDetail::where('user_id', $user_id)->count();

    	$data = $request->all();

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

    	// dd($data);

    	if ($user_count > 0) {
    		StudentDetail::where('user_id', $user_id)->update([
	    		'user_id' => $user_id,
	    		'class_room' => $data['class_room'],
	    	]);
    	} else {
    		StudentDetail::where('user_id', $user_id)->create([
	    		'user_id' => $user_id,
	    		'class_room' => $data['class_room'],
	    	]);
    	}

    	User::where('id', $user_id)->update([
    		'name' => $data['name'],
            'avatar' => $avatar_name,
    	]);
    	// echo "<pre>"; print_r($data); die;

    	return redirect()->back()->with('toast_success', 'Profil telah diubah');
    }

    public function updatePassword(Request $request) {
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
}
