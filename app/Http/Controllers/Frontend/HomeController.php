<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Gallery;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $packages = Package::all();
        return view('frontend.home', compact('packages'));
    }

    public function gallery(): View
    {
        $galleries = Gallery::latest()->paginate(20);
        return view('frontend.gallery', compact('galleries'));
    }

    public function filterGallery(Request $request)
    {
        $query = Gallery::latest();
        
        if ($request->category && $request->category !== 'all') {
            $query->where('category', $request->category);
        }
        
        $galleries = $query->paginate(20)->through(function ($gallery) {
            return [
                'id' => $gallery->id,
                'title' => $gallery->title,
                'file_path' => $gallery->file_path,
                'type' => $gallery->type,
                'category' => $gallery->category,
            ];
        });
        
        return response()->json([
            'html' => view('frontend.gallery.partials.grid', compact('galleries'))->render(),
            'pagination' => $galleries->links()->toHtml()
        ]);
    }

    public function packages(): View
    {
        $packages = Package::all();
        return view('frontend.packages', compact('packages'));
    }

    public function about(): View
    {
        $teamMembers = TeamMember::all();
        return view('frontend.about', compact('teamMembers'));
    }

    public function contact(): View
    {
        return view('frontend.contact');
    }
}