<?php

namespace App\Http\Controllers;

use App\Picture;

use Illuminate\Http\Request;

use App\Name;

use Carbon\Carbon;

use Illuminate\Support\Facades\DB;

use Symfony\Component\Console\Input;

use App\Repositories\Names;

class NamesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        // $names = Name::all()->orderBy('last');

        $names = Name::orderBy('last')->orderBy('first')->paginate(15);

        return view('names.index', compact('names'));
    }


    public function create()
    {
        return view('names.create');
    }


    public function store()
    {
        if (!request('last') && !request('first') && !request('middle') && !request('alias')) {
            return back()->WithErrors(['A name must be entered.']);
        }

        $id =  Name::create(request(['byear','bmonth','bday','last','first','middle','alias','note']))->id;

        return redirect('/profile/'.$id);
    }


    public function show(Name $name, Names $names)
    {
        // $dob = (new \App\Repositories\Names)->Dob($name->byear, $name->bmonth, $name->bday, $name->note);

        $dob = $names->Dob($name->byear, $name->bmonth, $name->bday, $name->note);

        // $dob = Name::dob($name->byear, $name->bmonth, $name->bday, $name->note);
        // $avatar = (new Picture())->where('avatar', 1)->where('name_id', $name->id)->first();

        return view('names.show', compact('name', 'dob'));
    }


    public function edit(Name $name)
    {
        // $dob = (new \App\Repositories\Names)->Dob($name->byear, $name->bmonth, $name->bday, $name->note);
        // $avatar = (new Picture())->where('avatar', 1)->where('name_id', $name->id)->first();

        return view('names.edit', compact('name'));
    }


    public function update(Request $request, Name $name)
    {
        if (!request('last') && !request('first') && !request('middle') && !request('alias')) {
            return back()->WithErrors(['A name must be entered.']);
        }

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
                            SELECT id, CONCAT(first,' ',middle,' ',last,' aka: ', alias) as name
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

        return response()->json($data);
    }


    public function find(Request $request)
    {
        $term = $request->input('name');

        $names = DB::select("
            SELECT id, first, last, middle, alias
            FROM names
            WHERE CONCAT( first,' ',middle,' ',last,' aka: ', alias ) LIKE  '%$term%'

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
