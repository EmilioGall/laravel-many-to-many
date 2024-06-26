<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $typesArray = Type::all();

        // dd($typesArray);

        return view('admin.types.index', compact('typesArray'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateTypeRequest $request)
    {

        $newTypeName = $request->validated();

        $newType = new Type();

        $newType->fill($newTypeName);

        $newType->slug = Str::slug($newType->name, '_');

        $newType->save();

        // dd($newType);

        return redirect()->route('admin.types.index');
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
    public function edit(Type $type)
    {
        return view('admin.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTypeRequest $request, Type $type)
    {

        $modifiedTypeName = $request->validated();

        // dd($modifiedTypeName);

        $type->slug = Str::slug($modifiedTypeName['name'], '_');

        $type->update($modifiedTypeName);

        // dd($type);

        return redirect()->route('admin.types.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
