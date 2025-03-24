<?php

namespace App\Http\Controllers;

use App\Models\Co;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;


class CoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $cos = Co::orderBy('id', 'desc')->paginate($perPage);

        return view('cos.index', compact('cos'));
    }
    public function create()
    {
        return view('cos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'legislatura' => 'nullable|string|max:15',
            'fcap' => 'nullable|date',
            'frec' => 'nullable|date',
            'ncor' => 'nullable|string|max:30',
            'tcor' => 'nullable|string|max:30',
            'ccor' => 'nullable|string|max:30',
            'fofi' => 'nullable|date',
            'nofi' => 'nullable|string|max:20',
            'nhoj' => 'nullable|integer',
            'rem_nombre' => 'nullable|string|max:70',
            'rem_cargo' => 'nullable|string|max:50',
            'rem_deporg' => 'nullable|string|max:60',
            'rem_dir' => 'nullable|string',
            'des' => 'nullable|string',
            'seguimiento' => 'nullable|string',
            'tur_nom' => 'nullable|string|max:70',
            'tur_cargo' => 'nullable|string|max:50',
            'tur_deporg' => 'nullable|string|max:60',
            'creo' => 'nullable|string|max:60',
            'modifico' => 'nullable|string|max:20',
            'reporte' => 'nullable|string|max:20',
            'estatus' => 'boolean',
        ]);

        $co = Co::create($validated);
        return response()->json($co, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Co $co)
    {
        return response()->json($co, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Co $co)
    {
        $validated = $request->validate([
            'legislatura' => 'nullable|string|max:15',
            'fcap' => 'nullable|date',
            'frec' => 'nullable|date',
            'ncor' => 'nullable|string|max:30',
            'tcor' => 'nullable|string|max:30',
            'ccor' => 'nullable|string|max:30',
            'fofi' => 'nullable|date',
            'nofi' => 'nullable|string|max:20',
            'nhoj' => 'nullable|integer',
            'rem_nombre' => 'nullable|string|max:70',
            'rem_cargo' => 'nullable|string|max:50',
            'rem_deporg' => 'nullable|string|max:60',
            'rem_dir' => 'nullable|string',
            'des' => 'nullable|string',
            'seguimiento' => 'nullable|string',
            'tur_nom' => 'nullable|string|max:70',
            'tur_cargo' => 'nullable|string|max:50',
            'tur_deporg' => 'nullable|string|max:60',
            'creo' => 'nullable|string|max:60',
            'modifico' => 'nullable|string|max:20',
            'reporte' => 'nullable|string|max:20',
            'estatus' => 'boolean',
        ]);

        $co->update($validated);
        return response()->json($co, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Co $co)
    {
        $co->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
