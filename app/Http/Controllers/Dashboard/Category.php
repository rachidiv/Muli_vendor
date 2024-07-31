<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category as modelCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
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
        $category = new modelCategory();
        return view('dashboard.categories.create',compact('parents','category'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate(modelCategory::rules());
        $request->validate(modelCategory::rules(),[
            'required' => 'this field (:attribute) is required',
            'unique' => 'this is name already exist'
        ]);

            // name.'required' => 'this field (:attribute) is required',
            // name.'unique' => 'this is name already exist'
            // if i did this i will apply it just to name field 
        $request->merge([
            'slug' => Str::slug($request->post('name'))
        ]); 

        $data = $request->except('image');
        $data['image'] = $this->uploadImage($request);
       
    $category = modelCategory::create($data);
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
    public function update(CategoryRequest $request, string $id)
    {
            $category= modelCategory::findOrFail($id);
            $old_image = $category->image;
            $data = $request->except('image');
            $new_image = $this->uploadImage($request);
            if($new_image){
                $data['image'] = $new_image;

            }

         
            $category->update($data);
        if ($old_image && $new_image) {
            Storage::disk('public')->delete($old_image);
        }
        return redirect()->route('dashboard.categories.index')->with('success','Category updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // modelCategory::destroy($id);
        $category = modelCategory::findOrFail($id);
        $category->delete();
       if ($category->image) {
         Storage::disk('public')->delete($category->image);
       }
        return redirect()->route('dashboard.categories.index')->with('success','Category deleted');

    }
    public function uploadImage(Request $request){
        if (!$request->hasFile('image')) {
          return;
        }
                $file = $request->file('image');
                $path = $file->store('upload',[
                   'disk' =>'public'
                    ]);
                    return $path;
    }
}