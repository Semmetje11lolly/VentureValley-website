<?php

namespace App\Http\Controllers;

use App\Models\Show;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ShowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shows = Show::where('public', 1)->get();

        return view('shows.index', compact('shows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.shows.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'type' => 'required|string|max:100',
            'subtitle' => 'required|string|max:255',
            'tagline' => 'required|string|max:255',
            'description' => 'required|string',

            'list_image' => 'required|image|mimes:webp|dimensions:width=600,height=800',
            'background_image' => 'required|image|mimes:webp',

            'show_times' => 'required|array|min:1',
            'show_times.*.start_time' => 'required',
            'show_times.*.end_time' => 'required',
            'show_times.*.edition' => 'required|string|max:100',
            'show_times.*.location' => 'required|string|max:100',

            'public' => 'boolean'
        ]);

        $validated['list_image'] = $request->file('list_image')->store('shows', 'public');
        $validated['background_image'] = $request->file('background_image')->store('shows', 'public');

        $slug = Str::slug($request->input('name'));
        $originalSlug = $slug;
        $counter = 1;
        while (Show::where('slug', $slug)->exists()) {
            $slug = "{$originalSlug}-{$counter}";
            $counter++;
        }
        $validated['slug'] = $slug;

        $showTimes = $validated['show_times'];
        unset($validated['show_times']);

        $show = Show::create($validated);

        foreach ($showTimes as $showTime) {
            $show->showTimes()->create($showTime);
        }

        return redirect()->route('admin.parkshows.index')
            ->with('alert', "De parkshow {$validated['name']} is aangemaakt!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
