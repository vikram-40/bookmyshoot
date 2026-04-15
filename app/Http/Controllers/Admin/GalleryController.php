<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index(): View
    {
        $galleries = Gallery::latest()->paginate(20);
        return view('admin.gallery.index', compact('galleries'));
    }

    public function create(): View
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'file_path' => 'required|file|mimes:jpg,jpeg,png,gif,webp,mp4,mov,avi,webm|max:51200',
            'type' => 'required|in:image,video',
            'category' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '_' . Str::random(10) . '.' . $extension;
            
            $folder = $validated['type'] === 'video' ? 'videos' : 'images';
            $path = $file->storeAs('gallery/' . $folder, $filename, 'public');
            
            $validated['file_path'] = 'storage/' . $path;
        }

        Gallery::create($validated);

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Gallery item created successfully.');
    }

    public function show(Gallery $gallery): View
    {
        return view('admin.gallery.show', compact('gallery'));
    }

    public function edit(Gallery $gallery): View
    {
        return view('admin.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'file_path' => 'nullable|file|mimes:jpg,jpeg,png,gif,webp,mp4,mov,avi,webm|max:51200',
            'type' => 'required|in:image,video',
            'category' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('file_path')) {
            if ($gallery->file_path) {
                $this->deleteFile($gallery->file_path);
            }

            $file = $request->file('file_path');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '_' . Str::random(10) . '.' . $extension;
            
            $folder = $validated['type'] === 'video' ? 'videos' : 'images';
            $path = $file->storeAs('gallery/' . $folder, $filename, 'public');
            
            $validated['file_path'] = 'storage/' . $path;
        } else {
            unset($validated['file_path']);
        }

        $gallery->update($validated);

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Gallery item updated successfully.');
    }

    public function destroy(Gallery $gallery): RedirectResponse
    {
        if ($gallery->file_path) {
            $this->deleteFile($gallery->file_path);
        }

        $gallery->delete();

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Gallery item deleted successfully.');
    }

    private function deleteFile(string $path): void
    {
        $path = str_replace('storage/', '', $path);
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
}