<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Age;
use Illuminate\Support\Facades\Validator;

class AgeController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $ages = Age::orderBy('id', 'desc')->paginate($perPage);
        return view('ages.index', compact('ages'));
    }

    public function create()
    {
        return view('ages.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'titulo' => 'nullable|string|max:5',
            'nombre' => 'nullable|string|max:30',
            'apaterno' => 'nullable|string|max:30',
            'amaterno' => 'nullable|string|max:30',
            'cargo' => 'nullable|string|max:30',
            'deporg' => 'nullable|string|max:60',
            'telefono' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|max:255',
            'dir' => 'nullable|string',
            'modifico' => 'nullable|string|max:20',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Age::create($request->all());
        return redirect()->route('ages.index')->with('success', 'Registro creado correctamente.');
    }

    public function show($id)
    {
        $age = Age::findOrFail($id);
        return view('ages.show', compact('age'));
    }

    public function edit($id)
    {
        $age = Age::findOrFail($id);
        return view('ages.edit', compact('age'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'titulo' => 'nullable|string|max:5',
            'nombre' => 'nullable|string|max:30',
            'apaterno' => 'nullable|string|max:30',
            'amaterno' => 'nullable|string|max:30',
            'cargo' => 'nullable|string|max:30',
            'deporg' => 'nullable|string|max:60',
            'telefono' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|max:255',
            'dir' => 'nullable|string',
            'modifico' => 'nullable|string|max:20',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $age = Age::findOrFail($id);
        $age->update($request->all());

        return redirect()->route('ages.index')->with('success', 'Registro actualizado correctamente.');
    }

    public function destroy($id)
    {
        $age = Age::findOrFail($id);
        $age->delete();

        return redirect()->route('ages.index')->with('success', 'Registro eliminado correctamente.');
    }


}
