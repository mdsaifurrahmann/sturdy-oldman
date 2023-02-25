<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    /*
     * Create Album View
     * */

    public function createAlbumView()
    {
        $albums = DB::table('albums')
            ->get();
        return view('area52.gallery.albums', compact('albums'));
    }

    /*
     * Create Album
     * */

    public function createAlbum(Request $request)
    {
        $this->validate($request, [
            'album_name' => 'required|string',
            'album_description' => 'string|nullable',
            'album_cover' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'album_name.required' => 'Album Name is required',
            'album_name.string' => 'Album Name must be a string',
            'album_description.string' => 'Album Description must be a string',
            'album_cover.required' => 'Album Cover is required',
            'album_cover.image' => 'Album Cover must be an image',
            'album_cover.mimes' => 'Album Cover must be a file of type: jpeg, png, jpg, gif, svg',
            'album_cover.max' => 'Album Cover may not be greater than 2048 kilobytes',
        ]);

        $album_name = $request->input('album_name');

        $album_description = $request->input('album_description');


        $album_cover = $request->file('album_cover');

        $album_cover_name = time() . '.' . Str::random(16) . Str::replace(' ', '-', $album_cover->getClientOriginalName());
        $destinationPath = public_path('/images/album_covers');
        $album_cover->move($destinationPath, $album_cover_name);

        $data = [
            'name' => $album_name,
            'description' => $album_description,
            'cover_image' => $album_cover_name,
            'created_at' => now(),
        ];

        DB::table('albums')->insert($data);

        return redirect()->back()->with('success', 'Album Created Successfully');
    }

    /*
     * Delete Album
     * */

    public function deleteAlbum($id)
    {
        $check = DB::table('gallery')->where('album_id', $id)->exists();

        if ($check) {
            return redirect()->back()->with('error', 'Can not delete album, because it has images.');
        } else {
            $retrive = DB::table('albums')->where('id', $id)->first();
            $file = $retrive->cover_image;
            if (File::exists(public_path() . '/images/album_covers/' . $file)) {
                File::delete(public_path() . '/images/album_covers/' . $file);
            }


            DB::table('albums')->where('id', $id)->delete();
            return redirect()->back()->with('success', 'Album deleted successfully');
        }
    }


    /*
     * add images to album view
     * */

    public function addImagesToAlbum()
    {
        $albums = DB::table('albums')
            ->select('id', 'name')
            ->get();
        return view('area52.gallery.add-images', compact('albums'));
    }

    /*
     * add images to album
     * */

    public function addImages(Request $request)
    {
        $this->validate($request, [
            'album_id' => 'required',
            'gallery.*' => 'required',
        ], [
            'album_id.required' => 'Album is required',
            'gallery.*.required' => 'Images are required',
        ]);

        $data = [];


        $album_id = $request->input('album_id');
        $gallery = $request->gallery;

        foreach ($gallery as $key => $image) {
            if ($request->hasFile('gallery.' . $key . '.image')) {
                $image = 'gallery.' . $key . '.image';
                $title = 'gallery.' . $key . '.title';

                $this->validate($request, [
                    $image => 'image|mimes:jpeg,png,jpg|max:2048',
                    $title => 'string|nullable',
                ], [
                    'gallery.' . $key . '.image' => 'Images must be an image',
                    'gallery.' . $key . '.image.mimes' => 'Images must be a file of type: jpeg, png, jpg, gif, svg',
                    'gallery.' . $key . '.image.max' => 'Images may not be greater than 2048 kilobytes',
                    'gallery.' . $key . '.title.string' => 'Image Title must be a string',
                ]);

                $file = $request->file('gallery.' . $key . '.image');
                $image_name = time() . '.' . Str::random(16) . Str::replace(' ', '-', $file->getClientOriginalName());
                $destinationPath = public_path('/images/gallery');
                $file->move($destinationPath, $image_name);

                $info = [
                    'title' => $request->input($title),
                    'image' => $image_name,
                ];

                array_push($data, $info);
            }
        }

        $gather = [
            'album_id' => $album_id,
            'images' => json_encode($data),
            'created_at' => now(),
        ];

        //check if album_id exists in gallery table

        $check = DB::table('gallery')->where('album_id', $album_id)->exists();

        if ($check) {
            $retrive = DB::table('gallery')->where('album_id', $album_id)->first();
            $images = json_decode($retrive->images);
            $new_images = array_merge($images, $data);
            $new_images = json_encode($new_images);
            DB::table('gallery')->where('album_id', $album_id)->update(['images' => $new_images]);
            return redirect()->back()->with('success', 'Images added to album successfully');
        }

        DB::table('gallery')->insert($gather);


        return redirect()->back()->with('success', 'Images added to album successfully');


    }

    /*
     * Album list
     * */

    public function albumList()
    {
        $albums = DB::table('albums')
            ->select('id', 'name', 'description', 'cover_image')
            ->get();
        return view('area52.gallery.album-list', compact('albums'));
    }


    /*
     * view album
     * */

    public function albumImages($id)
    {
        $retrieve = DB::table('gallery')
            ->join('albums', 'albums.id', '=', 'gallery.album_id')
            ->select('gallery.images', 'albums.name as album_name', 'albums.description as album_description', 'albums.cover_image as album_cover', 'albums.id as album_id')
            ->where('album_id', $id)
            ->first();

        $images = json_decode($retrieve->images);


        return view('area52.gallery.album-view', compact('images', 'retrieve'));
    }

    /*
     * delete image from album
     * */

    public function deleteImage($id, $image)
    {
        $retrieve = DB::table('gallery')->where('album_id', $id)->first();
        $images = json_decode($retrieve->images);
        $new_images = [];
        foreach ($images as $key => $value) {
            if ($value->image != $image) {
                array_push($new_images, $value);
            }
        }
        $new_images = json_encode($new_images);
        if (File::exists(public_path() . '/images/gallery/' . $image)) {
            File::delete(public_path() . '/images/gallery/' . $image);
        }
        DB::table('gallery')->where('album_id', $id)->update(['images' => $new_images]);

        return redirect()->back()->with('success', 'Image deleted successfully');
    }
}
