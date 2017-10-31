<?php

namespace App\Http\Controllers;

use App\Picture;
use Illuminate\Http\Request;

use App\Name;

use Carbon\Carbon;

use Illuminate\Support\Facades\DB;

use Symfony\Component\Console\Input;

class NamesController extends Controller
{

    public function index()
    {
        $names = new Name();
        $names = $names->all();

        return view('names.index', compact('names'));
    }


    public function create()
    {
        return view('names.create');
    }


    public function store(Request $request)
    {
        $name = new Name();

        $name->byear = $request->byear;
        $name->bmonth = $request->bmonth;
        $name->bday = $request->bday;

        $name->last = $request->last;
        $name->first = $request->first;
        $name->middle = $request->middle;
        $name->alias = $request->alias;
        $name->note = $request->note;
        $name->save();
        $id = $name->id;

        return redirect('/profile/'.$id);
    }


    public function show(Name $name)
    {
        $dob = (new \App\Repositories\Names)->Dob($name->byear, $name->bmonth, $name->bday, $name->note);
        $avatar = (new Picture())->where('avatar', 1)->where('name_id', $name->id)->first();

        return view('names.show', compact('name', 'dob', 'avatar'));
    }


    public function edit(Name $name)
    {
        $dob = (new \App\Repositories\Names)->Dob($name->byear, $name->bmonth, $name->bday, $name->note);
        $avatar = (new Picture())->where('avatar', 1)->where('name_id', $name->id)->first();

        return view('names.edit', compact('name', 'dob', 'avatar'));
    }


    public function update(Request $request, Name $name)
    {
        $name->update($request->all());

        return redirect('/profile/'.$name->id);
    }


    public function destroy(Name $name)
    {
        $name->delete();

        return redirect('/names/list');
    }





    public function search()
    {
        return view('search');
    }


    public function autocomplete(Request $request)
    {
        $term = $request->input('query');

        $result = DB::select("
                            SELECT id, CONCAT(first,', ',last,', ',middle,', aka: ', alias) as name
                            FROM names
                            where first like '%$term%'
                            OR last like '%$term%'
                            OR middle like '%$term%'
                            OR alias like '%$term%';
                            ");

        return response()->json($result);
    }


    public function ajaxData(Request $request)
    {


        $data = Name::select("first")->where("first", "LIKE", "%{$request->input('query')}%")->get();



      //  return $request;


        return response()->json($data);
    }



    public function find(Request $request)
    {
        $term = $request->input('name');

        $names = DB::select("
            SELECT id, first, last, middle, alias
            FROM names
            WHERE CONCAT( first,', ',last,', ',middle,', aka: ', alias ) LIKE  '%$term%';
        ");

        if (count($names) === 1) {
            return redirect('/profile/'.$names[0]->id);
        }

        return view('names.searchResults', compact('names'));
    }


    /*

    public function getSearchResults($term)
    {
        $sql = "
                SELECT id, last_name, first_name, middle_name, alias_name
                FROM person
                WHERE   last_name   LIKE '%" . $term . "%'
                OR      first_name  LIKE '%" . $term . "%'
                OR      middle_name LIKE '%" . $term . "%'
                OR      alias_name  LIKE '%" . $term . "%'
               ";

        $stmt =  $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt;
    }

    */



}
