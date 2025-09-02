<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::where(function ($query) use ($request) {
            $query->where('user_id', $request->user()->id)
                ->orWhereNull('user_id');
        })
        ->orderByRaw('user_id IS NOT NULL')
        ->orderBy('name', 'asc')
        ->get();

        return response()->json($categories);
    }
}
