<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('blogs.index', compact('blogs'));
    }

    public function create()
    {
        $categories = Category::latest()->get();
        return view('blogs.create', compact('categories'));
    }

    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blogs.show', compact('blog'));
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $categories = Category::latest()->get();

        $filtered = array();

        foreach ($categories as $categ) {
            $bool = false;
            foreach ($blog->category as $category) {
                if ($categ->id == $category->id) {
                    $bool = true;
                    break;
                }
            }
            if (!$bool) {
                $filtered[] = $categ;
                $bool = false;
            }
        }
        return view('blogs.edit', ['blog' => $blog, 'categories' => $categories, 'filtered' => $filtered]);
    }

    public function delete($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return redirect()->route('blogs.index');
    }

    public function trash()
    {
        $trashedBlogs = Blog::onlyTrashed()->get();
        return view('blogs.trash', compact('trashedBlogs'));
    }

    public function restore($id)
    {
        $restoreBlog = Blog::onlyTrashed()->findOrFail($id);
        $restoreBlog->restore();
        return redirect()->route('blogs.index');
    }

    public function permanentDelete($id)
    {
        $permanentDeleteBlog = Blog::onlyTrashed()->findOrFail($id);
        $permanentDeleteBlog->forceDelete();
        return back();
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $blog = Blog::findOrFail($id);
        $blog->update($input);

        // Sync with categories
        if ($request->category_id) {
            $blog->category()->sync($request->category_id);
        }

        return redirect()->route('blogs.index');
    }

    public function store(Request $request)
    {
        // First way of saving
        $input = $request->all();
        // Image upload 
        if ($file = $request->file('featured_image')) {
            $name = uniqid() . $file->getClientOriginalName();
            $file->move('images/featured_image/', $name);
            $input['featured_image'] = $name;
        }

        // meta stuff
        $input['slug'] = str_slug($request->title, '-');
        $input['meta_title'] = str_limit($request->title, 55);
        $input['meta_description'] = str_limit($request->body, 155);

        $blog = Blog::create($input);

        // Second way of saving
        // $blog = new Blog();
        // $blog->title = $request->title;
        // $blog->body = $request->body;
        // $blog->save();

        // Sync with categories
        if ($request->category_id) {
            $blog->category()->sync($request->category_id);
        }

        return redirect()->route('blogs.index');
    }
}
