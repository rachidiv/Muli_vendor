<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category as modelCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;


class Category extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=modelCategory::all();
        return view('dashboard.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parents = modelCategory::all();
        return view('dashboard.categories.create',compact('parents'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge([
            'slug' => Str::slug($request->post('name'))
        ]);
    $category = modelCategory::create($request->all());
    return Redirect::route('dashboard.categories.index')->with('success','Category added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    try {
        $category= modelCategory::findOrFail($id);

    } catch (Exception $e) {
        return redirect()->route('dashboard.categories.index')->with('info','Record not found');
    }
            $parents = modelCategory::where('id','<>',$id)
            ->where(function($query) use($id){
                $query->whereNull('parent_id')
                ->Orwhere('parent_id','<>',$id);

            })
            ->get();

        return view('dashboard.categories.edit',compact('category','parents'));
     }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    
            $category= modelCategory::findOrFail($id);

  
        $category->update($request->all());
        return redirect()->route('dashboard.categories.index')->with('success','Category updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        modelCategory::destroy($id);
        return redirect()->route('dashboard.categories.index')->with('success','Category deleted');

    }
}