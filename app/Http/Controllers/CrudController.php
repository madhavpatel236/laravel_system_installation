<?php

namespace App\Http\Controllers;

use App\Models\CrudModel;
use Dba\Connection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $routePath = base_path('config/database.php');
        $fileContents = file_get_contents($routePath);
        $content = '// new_db';
        if (str_contains($fileContents, $content)) {
            return redirect()->route('Home.index');
        }
        $users = CrudModel::all();
        return view('crud', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'Name' => 'required|string|max:25   ',
        //     'Age' => 'required|integer|min:1|max:120',
        // ]);

        CrudModel::Create($request->only(['Name', 'Age']));

        $users = CrudModel::all();
        return view('crud', compact('users'));
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
        $users = CrudModel::findOrFail($id);
        return view('editCrudPage', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        // $request->validate([
        //     'Name' => 'required|string|max:25',
        //     'Age' => 'required|integer|min:1|max:120',
        // ]);

        $user = CrudModel::findOrFail($id);
        // echo "<pre>";
        // var_dump($request->only(['Name', 'Age']));
        // exit;
        $user->update($request->only(['Name', 'Age']));

        $users = CrudModel::all();
        // echo "<pre>";
        // var_dump($users);
        // exit;
        return redirect()->route('Crud.index');
        // return view('crud', compact('users'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = CrudModel::findOrFail($id);
        $user->delete($id);

        return redirect()->route('Crud.index');
        // return view('crud', compact('users'));
    }
}
