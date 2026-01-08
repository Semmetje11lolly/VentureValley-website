<?php

namespace App\Http\Controllers;

use App\Models\Show;
use Gate;
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
    public function show(Show $show)
    {
        if (!$show->public && Gate::denies('admin')) abort(404);

        $shows = Show::where('id', '!=', $show->id)
            ->inRandomOrder()
            ->take(3)
            ->get();

        $show->load('showTimes');

        return view('shows.show', compact('show', 'shows'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Show $show)
    {
        $show->load('showTimes');

        return view('admin.shows.edit', compact('show'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Show $show)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'type' => 'required|string|max:100',
            'subtitle' => 'required|string|max:255',
            'tagline' => 'required|string|max:255',
            'description' => 'required|string',

            'list_image' => 'nullable|image|mimes:webp|dimensions:width=600,height=800',
            'background_image' => 'nullable|image|mimes:webp',

            'show_times' => 'required|array|min:1',
            'show_times.*.id' => 'nullable|exists:show_times,id',
            'show_times.*.start_time' => 'required',
            'show_times.*.end_time' => 'required',
            'show_times.*.edition' => 'required|string|max:100',
            'show_times.*.location' => 'required|string|max:100',

            'public' => 'boolean'
        ]);

        if ($request->hasFile('list_image')) {
            $validated['list_image'] = $request->file('list_image')->store('shows', 'public');
        }
        if ($request->hasFile('background_image')) {
            $validated['background_image'] = $request->file('background_image')->store('shows', 'public');
        }

        $show->update(collect($validated)->except('show_times')->toArray());

        $existingIds = $show->showTimes->pluck('id')->toArray();
        $submittedIds = [];

        foreach ($validated['show_times'] as $timeData) {
            if (isset($timeData['id'])) {
                $showTime = $show->showTimes()->find($timeData['id']);
                $showTime->update($timeData);
                $submittedIds[] = $showTime->id;
            } else {
                $new = $show->showTimes()->create($timeData);
                $submittedIds[] = $new->id;
            }
        }

        $toDelete = array_diff($existingIds, $submittedIds);
        $show->showTimes()->whereIn('id', $toDelete)->delete();

        return redirect()->route('admin.parkshows.index')
            ->with('alert', "De parkshow {$show->name} is bijgewerkt!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Show $show)
    {
        $show->delete();

        return redirect()->route('admin.parkshows.index')
            ->with('alert', "De parkshow {$show->name} is verwijderd!");
    }
}
