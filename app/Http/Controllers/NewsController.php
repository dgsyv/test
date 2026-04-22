<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $query = News::latest();

        if ($request->category) {
            $query->where('category_id', $request->category);
        }

        // 🔍 SEARCH
        if ($request->search) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $news = $query->paginate(6);
        $categories = Category::all();

        return view('user.index', compact('news', 'categories'));
    }

    public function show($slug)
    {
        $news = News::where('slug', $slug)->firstOrFail();
        return view('user.show', compact('news'));
    }
}
