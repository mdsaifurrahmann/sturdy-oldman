<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {

        if (!Auth::user()->hasRole(['nuke', 'admin', 'moderator'])) {
            return redirect()->route('govern')->with('error', 'You are not authorized to access this page');
        }

        $id = Auth::user()->id;
        $retrieve = User::where('users.id', $id)
            ->join('profile', 'users.id', '=', 'profile.user_id')
            ->select('users.*', 'profile.*')
            ->first();

        // dd($retrieve);
        return view('area52.profile.account-settings', compact('retrieve'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if (!Auth::user()->hasRole(['nuke', 'admin', 'moderator'])) {
            return redirect()->route('govern')->with('error', 'You are not authorized to access this page');
        }

        $id = Auth::user()->id;
        $requestData = $request->all();

        $validator = Validator::make(
            $requestData,
            [
                'name' => 'required|string',
                'email' => 'required|string|email',
                'mobile' => 'required|string',
                'zip' => 'nullable|string|max:4',
                'state' => 'nullable|string',
                'designation' => 'nullable|string',
                'address' => 'nullable|string',
                'profile_image' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
            ],
            [
                'name.required' => 'The name field is required.',
                'email.required' => 'The email field is required.',
                'email.email' => 'Please provide a valid email address.',
                'mobile.required' => 'The mobile field is required.',
                'zip.max' => 'The zip field cannot exceed :max characters.',
                'profile_image.image' => 'The profile image must be an image file.',
                'profile_image.mimes' => 'The profile image must be a file of type: :values.',
                'profile_image.max' => 'The profile image size cannot exceed :max kilobytes.',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();

        try {
            // Update 'users' table
            User::where('id', $id)->update($request->only(['name', 'email', 'mobile']));

            // Update 'profile' table through the relationship
            $profileData = $request->only(['zip', 'state', 'designation', 'address']);
            $user = User::find($id); // Retrieve the user instance

            if ($user->profile) {
                if ($request->hasFile('profile_image')) {
                    if (File::exists(public_path('images/profile/' . $user->profile->profile_image))) {
                        File::delete(public_path('images/profile/' . $user->profile->profile_image));
                    }

                    $file = $request->file('profile_image');
                    $nameHandler = time() . '-profile-' . Str::random(16) . '.' . $file->extension();

                    $profileData['profile_image'] = $nameHandler;
                }

                $user->profile->update($profileData);

                if ($request->hasFile('profile_image') && ($user->profile->update($profileData)) == 1) {
                    $file->move(public_path('images/profile/'), $nameHandler);
                }
            }

            DB::commit();

            return redirect()->back()->with('success', 'Profile Updated Successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Something went wrong, Here are the details: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user = Auth::user();
        // Ensure the user has the necessary roles (e.g., 'nuke', 'admin', 'moderator')
        if (!auth()->user()->hasRole(['nuke', 'admin', 'moderator'])) {
            return redirect()->route('govern')->with('error', 'You are not authorized to access this page');
        }

        if (File::exists(public_path('images/profile/' . $user->profile->profile_image))) {
            File::delete(public_path('images/profile/' . $user->profile->profile_image));
        }

        $user->roles()->detach();
        $user->profile->delete();
        $user->delete();

        DB::commit();

        return redirect()->route('login')->with('success', 'User deleted successfully');
    }
}
