<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    // Method to display all categories
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    // Method to display a single category and its items
    public function show($id)
    {
        $category = Category::with('items')->findOrFail($id);
        $allCategories = Category::all(); // Fetch all categories before passing to the view

        return view('categories.show', [
            'category' => $category,
            'allCategories' => $allCategories // Now correctly passing all categories to the view
        ]);
    }
}
