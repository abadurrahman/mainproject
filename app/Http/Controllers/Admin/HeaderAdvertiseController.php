<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\HeaderAdvertise;
use Illuminate\Http\Request;
use Image;

class HeaderAdvertiseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $data = array(
            'headerAds' => HeaderAdvertise::orderBy('created_at', 'desc')->get()
        );
        return view('admin.headerAd.index', $data);
    }

    public function store(Request $request)
    {
        $headerAdData = $this->validateRequest();
        $headerAdData['slug'] = $this->createSlug($this->checkSlug($request->title));
        if ($request->hasFile('image')) {
            $headerAdData['image'] = $this->uploadImage($request->file('image'));
        }
        if (HeaderAdvertise::create($headerAdData)) {
            $notification=array(
                'message' => 'Header Advertise Added successfully! ',
                'alert-type' => 'success'
            );
        } else {
            $notification=array(
                'message' => 'Something Went wrong!',
                'alert-type' => 'danger'
            );
        }
        return redirect()->route('header-advertise.index')->with($notification);
    }

    public function edit(HeaderAdvertise $header_advertise)
    {
        $data = array(
            'headerAds' => HeaderAdvertise::all(),
            'headerAdvertise' => $header_advertise,
        );
        return view('admin.headerAd.edit', $data);
    }

    public function update(Request $request, HeaderAdvertise $header_advertise)
    {
        $headerAdData = $this->validateRequest();
        $headerAdData['slug'] = $this->createSlug($this->checkSlug($request->title));

        if ($request->hasFile('image')) {
            $headerAdData['image'] = $this->uploadImage($request->file('image'));
        }

        if ($header_advertise->update($headerAdData)) {
            $notification=array(
                'message' => 'Header Advertise Updated successfully! ',
                'alert-type' => 'success'
            );
        } else {
            $notification=array(
                'message' => 'Something Went wrong!',
                'alert-type' => 'danger'
            );
        }
        return redirect()->route('header-advertise.index')->with($notification);
    }

    public function destroy(HeaderAdvertise $header_advertise)
    {
        if ($header_advertise->delete()) {
            $notification=array(
                'message' => 'Header Advertise Delated successfully! ',
                'alert-type' => 'success'
            );
        } else {
            $notification=array(
                'message' => 'Something Went wrong!',
                'alert-type' => 'danger'
            );
        }
        return redirect()->route('header-advertise.index')->with($notification);
    }

    private function validateRequest()
    {
        return request()->validate([
            'title' => 'sometimes',
            'image' => 'required',
            'source_link' => 'sometimes',
            'show_days' => 'sometimes',
        ]);
    }

    private function uploadImage($image)
    {
        $timestemp = time();
        $imageName = $timestemp . '.' . $image->getClientOriginalExtension();
        $path = storage_path() . '/app/public/uploads/HeaderAd/' . $imageName;
        Image::make($image)->fit(480, 480)->save($path);
        return $imageName;
    }

    private function createSlug($title)
    {
        return $this->checkSlug(mb_strtolower(preg_replace('/[ ,.@#$%^&*()_\/=]+/', '-', trim($title)), 'UTF-8'));
    }

    private function checkSlug($slug)
    {
        $all_slugs = HeaderAdvertise::select('slug')->where('slug', 'like', $slug . '%')->get();

        if (!$all_slugs->contains('slug', $slug)) {
            return $slug;
        }
        $i = 1;
        while ($i++) {
            $new_slug = $slug . '-' . $i;
            if (!$all_slugs->contains('slug', $new_slug)) {
                return $new_slug;
            }
        }
    }

}
