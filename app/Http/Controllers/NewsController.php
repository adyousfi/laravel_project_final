<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     */
    public function index()
    {
       
        $newsItems = News::orderBy('publish_date', 'desc')->get();

       
        return view('admin.news.index', compact('newsItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'description'  => 'required|string',
            'image'        => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'publish_date' => 'required|date',
        ]);

       
        $path = $request->file('image')->store('uploads/news', 'public');

       
        $newsItem = new News();
        $newsItem->title         = $validated['title'];
        $newsItem->description   = $validated['description'];
        $newsItem->image         = $path;
        $newsItem->publish_date  = $validated['publish_date'];
        $newsItem->save();
        
        return redirect()->route('admin.news.index')->with('success', 'Nieuwsitem succesvol aangemaakt!');
    }

    /**
     * Display the specified resource.
     * 
     */
    public function show($id)
    {
        $newsItem = News::findOrFail($id);

        
        return view('news.show', compact('newsItem'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $newsItem = News::findOrFail($id);

        
        return view('admin.news.edit', compact('newsItem'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'description'  => 'required|string',
            'image'        => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'publish_date' => 'required|date',
        ]);

        $newsItem = News::findOrFail($id);

        $newsItem->title         = $validated['title'];
        $newsItem->description   = $validated['description'];
        $newsItem->publish_date  = $validated['publish_date'];

       
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('uploads/news', 'public');
            $newsItem->image = $path;
        }

        $newsItem->save();

        return redirect()->route('admin.news.index')->with('success', 'Nieuwsitem succesvol bijgewerkt!');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $newsItem = News::findOrFail($id);
        $newsItem->delete();

        return redirect()->route('admin.news.index')->with('success', 'Nieuwsitem succesvol verwijdert!');
    
    }

    public function showPublicList()
    {
        $newsItems = News::latest()->get(); 
        return view('news.index', compact('newsItems'));
    }

    public function showPublicDetail($id)
    {
        $newsItem = News::findOrFail($id); 
        return view('news.show', compact('newsItem'));
    }
}
