<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        //untuk mencari nama buku dengan name
        $search = $request->search;
        $categories = Category::where('name', 'LIKE', '%' . $search . '%')
            ->get();
            if ($categories->count() <= 0) {
                $categories = Category::get();
            }
        return view('category.categories', ['categories' => $categories, 'search' => $search]);
    }
    public function add()
    {
        return view('category.category-add');
    }
    public function store(Request $request)
    {
        // untuk menambahkan kategori baru
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:100',
        ]);
        $category = Category::create($request->all());
        return redirect('categories')->with('status', 'Berhasil Menambahkan kategori !');
    }
    public function edit($slug)
    {
        // untuk mengedit kategori
        $category = Category::where('slug', $slug)->first();
        return view('category.category-edit', ['category' => $category]);
    }
    public function update(request $request)
    {
        // untuk mengupdate kategori
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:100',
        ]);
        $category = category::where('slug', $request->slug)->first();
        $category->slug = null;
        $category->update($request->all());
        return redirect('categories')->with('status', 'Berhasil Memperbarui Kategori !');
    }
    // public function delete($slug)
    // {
    //     $category = Category::where('slug', $slug)->first();
    //     return view('category.category-delete', ['category' => $category]);
    // }
    public function destroy(Request $request)
    {
        // untuk menghapus kategori
        $category = Category::where('slug', $request->slug)->first();
        $category->delete();
        return redirect('categories')->with('status', 'Berhasil Menghapus Kategori !');
    }
    public function deletedCategory()
    {
        // agar tidak terhapus di database
        $deletedCategories = Category::onlyTrashed()->get();
        return view('category.category-deleted-list', ['deletedCategories' => $deletedCategories]);
    }
    public function restore($slug)
    {
        // untuk memulihkan kategori yang terhapus
        $category = Category::withTrashed()->where('slug', $slug)->first();
        $category->restore();
        return redirect('categories')->with('status', 'Berhasil Memulihkan Kategori !');
    }
}
