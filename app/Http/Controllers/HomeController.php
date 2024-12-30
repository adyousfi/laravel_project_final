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
        // Haal de FAQ-categorieën en vragen op
        $faqCategories = FaqCategory::with('faqs')->get();
        

        // Stuur de data naar de view
        return view('home.index', compact('faqCategories'));
    }
}
