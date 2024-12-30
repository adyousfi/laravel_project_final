<?php

namespace App\Http\Controllers;

use App\Models\FaqCategory;
use Illuminate\Http\Request;

class FaqCategoryController extends Controller
{
    /**
     * Display a listing of the categories.
     */
    public function index()
{
    $categories = FaqCategory::all();
    return view('admin.faq_categories.index', compact('categories'));
}


    /**
     * Show the form for creating a new category.
     */
    public function create()
    {
        return view('admin.faq_categories.create');
    }

    /**
     * Store a newly created category in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);
        FaqCategory::create($request->only('name'));
        return redirect()->route('faq_categories.index')->with('success', 'Category created successfully.');
    }

    /**
     * Show the form for editing the specified category.
     */
    public function edit(FaqCategory $faqCategory)
    {
        return view('admin.faq_categories.edit', compact('faqCategory'));
    }

    /**
     * Update the specified category in storage.
     */
    public function update(Request $request, FaqCategory $faqCategory)
    {
        $request->validate(['name' => 'required|string|max:255']);
        $faqCategory->update($request->only('name'));
        return redirect()->route('faq_categories.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified category from storage.
     */
    public function destroy(FaqCategory $faqCategory)
    {
        $faqCategory->delete();
        return redirect()->route('faq_categories.index')->with('success', 'Category deleted successfully.');
    }
}
