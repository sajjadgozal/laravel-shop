<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:256',
            'slug' => 'required|max:256',
            'content' => 'required|max:256',
            'parent_id' => '',
        ]);

        Category::create([
            'name' => $validated['name'] ,
            'slug' => $validated['slug'] ,
            "content" => $validated['content'] ,
            // 'parent_id' => $validated['parent_id'],
        ]);

        return response()->json([
            'massage' => 'added'
        ],200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Category $category)
    {
        return response()->json([
            'massage' => 'show'
        ],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|max:256',
            'slug' => 'required|max:256',
            'content' => 'required|max:256',
            'parent_id' => ''
        ]);

        $category->update([
            "name" => $validated['name'] ,
            "slug" => $validated['slug'] ,
            "content" => $validated['content'] ,
            // "parent_id" => $validated['parent_id'] ,
        ]);

        return response()->json([
            'massage' => 'edited'
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json([
            'massage' => 'deleted'
        ],200);
    }
}
