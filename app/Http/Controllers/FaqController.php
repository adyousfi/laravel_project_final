<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\FaqCategory;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of all FAQs grouped by category (public view).
     */
    public function index()
{
    $faqs = Faq::with('category')->get();
    return view('admin.faqs.index', compact('faqs'));
}

    /**
     * Show the form for creating a new FAQ.
     */
    public function create()
{
    $categories = FaqCategory::all();
    return view('admin.faqs.create', compact('categories'));
}

    /**
     * Store a newly created FAQ in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'faq_category_id' => 'required|exists:faq_categories,id',
        ]);
    
        Faq::create($request->only('question', 'answer', 'faq_category_id'));
    
        return redirect()->route('faqs.index')->with('success', 'FAQ created successfully.');
    }
    

    /**
     * Show the form for editing the specified FAQ.
     */
    public function edit(Faq $faq)
    {
        $categories = FaqCategory::all();
        return view('admin.faqs.edit', compact('faq', 'categories'));
    }
    

    /**
     * Update the specified FAQ in storage.
     */
    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'faq_category_id' => 'required|exists:faq_categories,id',
        ]);
    
        $faq->update($request->only('question', 'answer', 'faq_category_id'));
    
        return redirect()->route('faqs.index')->with('success', 'FAQ updated successfully.');
    }
    

    /**
     * Remove the specified FAQ from storage.
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();
    
        return redirect()->route('faqs.index')->with('success', 'FAQ deleted successfully.');
    }

    
    
}
