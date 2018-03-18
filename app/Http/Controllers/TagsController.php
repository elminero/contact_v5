<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Name;

use App\Tag;

use Illuminate\Support\Facades\DB;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }



    /**
     * Attach an existing tag to a name
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function tagIt(Request $request, Name $name)
    {
        $name->tags()->attach($request->tag);

        return back();
    }




    /**
     * Store a newly created tag in tags table.
     * Attach the tag to a name
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Name $name)
    {
        $this->validate($request, [
            'name'=>'required|unique:tags'
        ]);


        $id = Tag::create(request(['name']))->id;
        $name->tags()->attach($id);

        return back();
    }







    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Name $name)
    {
        $name->tags()->detach($request->tag);

        // Remove the tag if its not used by another name.
        if (!count(DB::table('name_tag')->where('tag_id', $request->tag)->get())) {
            DB::table('tags')->where('id', $request->tag)->delete();
        }

        return back();
    }
}
