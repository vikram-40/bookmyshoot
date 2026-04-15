<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class TeamController extends Controller
{
    public function index(): View
    {
        $teamMembers = TeamMember::latest()->paginate(15);
        return view('admin.team.index', compact('teamMembers'));
    }

    public function create(): View
    {
        return view('admin.team.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif',
            'description' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $path = public_path('uploads/team');
            
            if (!File::exists($path)) {
                File::makeDirectory($path, 0755, true);
            }
            
            $file->move($path, $filename);
            $validated['image'] = 'uploads/team/' . $filename;
        }

        TeamMember::create($validated);

        return redirect()->route('admin.team.index')
            ->with('success', 'Team member created successfully.');
    }

    public function show(TeamMember $teamMember): View
    {
        if (!$teamMember) {
            abort(404, 'Team member not found');
        }
        return view('admin.team.show', compact('teamMember'));
    }

    public function edit(TeamMember $teamMember): View
    {
        return view('admin.team.edit', compact('teamMember'));
    }

    public function update(Request $request, TeamMember $teamMember): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif',
            'description' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            if ($teamMember->image && file_exists(public_path($teamMember->image))) {
                unlink(public_path($teamMember->image));
            }

            $file = $request->file('image');
            $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $path = public_path('uploads/team');
            $file->move($path, $filename);
            $validated['image'] = 'uploads/team/' . $filename;
        } else {
            unset($validated['image']);
        }

        $teamMember->update($validated);

        return redirect()->route('admin.team.index')
            ->with('success', 'Team member updated successfully.');
    }

    public function destroy(TeamMember $teamMember): RedirectResponse
    {
        if ($teamMember->image && file_exists(public_path($teamMember->image))) {
            unlink(public_path($teamMember->image));
        }

        $teamMember->delete();

        return redirect()->route('admin.team.index')
            ->with('success', 'Team member deleted successfully.');
    }
}