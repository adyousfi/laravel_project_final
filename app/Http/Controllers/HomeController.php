<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaqCategory;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    
    public function home()
    {
        $faqCategories = FaqCategory::with('faqs')->get();
        return view('home.index', compact('faqCategories'));
    }
}
