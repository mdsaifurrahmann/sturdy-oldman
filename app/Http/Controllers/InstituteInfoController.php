<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;

class InstituteInfoController extends Controller
{

    public function index()
    {
        $institute_info = DB::table('institute_info')->first();
        return view('area52.institute_info.index', compact('institute_info'));
    }

    public function clientLayout()
    {
        $info = DB::table('institute_info')->first();
        return view('layouts.fullLayoutClient', compact('info'));
    }

    public function update(Request $request)
    {

        $retrive = DB::table('institute_info')->first();

        $request->validate(
            [
                'institute_name' => 'required|string',
                'location' => 'required|string',
                'address' => 'required|string',
                'phone' => 'required|string',
                'phone_2' => 'nullable|string',
                'email' => 'required|email',
                'email_2' => 'nullable|email',
                'website' => 'required|string',
                'logo' => 'image|mimes:jpeg,png,jpg|max:512',
                'institute_image' => 'image|mimes:jpeg,png,jpg|max:1024',
                'image_left' => 'nullable|image|mimes:jpeg,png,jpg|max:512',
                'image_right' => 'nullable|image|mimes:jpeg,png,jpg|max:512',
                'favicon' => 'image|max:512',
                'facebook' => 'nullable|string',
                'twitter' => 'nullable|string',
                'instagram' => 'nullable|string',
                'youtube' => 'nullable|string',
                'linkedin' => 'nullable|string',
                'whatsapp' => 'nullable|string',
            ],
            [
                'institute_name.required' => 'Institute name is required',
                'location.required' => 'Location is required',
                'address.required' => 'Address is required',
                'phone.required' => 'Phone is required',
                'email.required' => 'Email is required',
                'website.required' => 'Website is required',
                'location.string' => 'Location must be a string',
                'address.string' => 'Address must be a string',
                'phone.string' => 'Phone must be a string',
                'phone_2.string' => 'Phone 2 must be a string',
                'email.email' => 'Email must be a valid email',
                'email_2.email' => 'Email 2 must be a valid email',
                'website.string' => 'Website must be a valid url',
                'facebook.string' => 'Facebook must be a valid url',
                'twitter.string' => 'Twitter must be a valid url',
                'instagram.string' => 'Instagram must be a valid url',
                'youtube.string' => 'Youtube must be a valid url',
                'linkedin.string' => 'Linkedin must be a valid url',
                'whatsapp.string' => 'Whatsapp must be a valid url',
            ]
        );

        $institute_name = $request->institute_name;
        $location = $request->location;
        $address = $request->address;
        $phone = $request->phone;
        $phone_2 = $request->phone_2;
        $email = $request->email;
        $email_2 = $request->email_2;
        $website = $request->website;
        $facebook = $request->facebook;
        $twitter = $request->twitter;
        $instagram = $request->instagram;
        $youtube = $request->youtube;
        $linkedin = $request->linkedin;
        $whatsapp = $request->whatsapp;

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logo_name = time() . Str::random(16) . '.' . Str::replace(' ', '-', $logo->getClientOriginalExtension());
            $logo->move(public_path('images/institute'), $logo_name);
        } else {
            $logo_name = $retrive->logo;
        }
        if ($request->hasFile('institute_image')) {
            $institute_image = $request->file('institute_image');
            $institute_image_name = time() . Str::random(16) . '.' . Str::replace(' ', '-', $institute_image->getClientOriginalExtension());
            $institute_image->move(public_path('images/institute'), $institute_image_name);
        } else {
            $institute_image_name = $retrive->institute_image;
        }
        if ($request->hasFile('image_left')) {
            $image_left = $request->file('image_left');
            $image_left_name = time() . Str::random(16) . '.' . Str::replace(' ', '-', $image_left->getClientOriginalExtension());
            $image_left->move(public_path('images/institute'), $image_left_name);
        } else {
            $image_left_name = $retrive->image_left;
        }
        if ($request->hasFile('image_right')) {
            $image_right = $request->file('image_right');
            $image_right_name = time() . Str::random(16) . '.' . Str::replace(' ', '-', $image_right->getClientOriginalExtension());
            $image_right->move(public_path('images/institute'), $image_right_name);
        } else {
            $image_right_name = $retrive->image_right;
        }
        if ($request->hasFile('favicon')) {
            $favicon = $request->file('favicon');
            $favicon_name = time() . Str::random(16) . '.' . Str::replace(' ', '-', $favicon->getClientOriginalExtension());
            $favicon->move(public_path('images/institute'), $favicon_name);
        } else {
            $favicon_name = $retrive->favicon;
        }

        $data = [
            'institute_name' => $institute_name,
            'location' => $location,
            'address' => $address,
            'phone' => $phone,
            'phone_2' => $phone_2,
            'email' => $email,
            'email_2' => $email_2,
            'website' => $website,
            'facebook' => $facebook,
            'twitter' => $twitter,
            'instagram' => $instagram,
            'youtube' => $youtube,
            'linkedin' => $linkedin,
            'whatsapp' => $whatsapp,
            'logo' => $logo_name,
            'institute_image' => $institute_image_name,
            'image_left' => $image_left_name,
            'image_right' => $image_right_name,
            'favicon' => $favicon_name,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ];

        // update data to database
        $update = DB::table('institute_info')->where('id', 1)->update($data);

        if ($update) {
            return redirect()->back()->with('success', 'Institute info updated successfully');
        } else {
            return redirect()->back()->with('error', 'Institute info not updated')->withInput();
        }
    }
}
