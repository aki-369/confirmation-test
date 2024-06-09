<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function showForm()
    {
        $categories = Category::all();
        return view('index', compact('categories'));
    }
}
