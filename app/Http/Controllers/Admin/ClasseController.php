<?php

namespace App\Http\Controllers\Admin;

use App\Classe;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyClasseRequest;
use App\Http\Requests\StoreClasseRequest;
use App\Http\Requests\UpdateClasseRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClasseController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('classe_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $classes = Classe::all();

        return view('admin.classes.index', compact('classes'));
    }

    public function create()
    {
        abort_if(Gate::denies('classe_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.classes.create');
    }

    public function store(StoreClasseRequest $request)
    {
        $classe = Classe::create($request->all());

        return redirect()->route('admin.classes.index');
    }

    public function edit(Classe $classe)
    {
        abort_if(Gate::denies('classe_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.classes.edit', compact('classe'));
    }

    public function update(UpdateClasseRequest $request, Classe $classe)
    {
        $classe->update($request->all());

        return redirect()->route('admin.classes.index');
    }

    public function show(Classe $classe)
    {
        abort_if(Gate::denies('classe_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.classes.show', compact('classe'));
    }

    public function destroy(Classe $classe)
    {
        abort_if(Gate::denies('classe_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $classe->delete();

        return back();
    }

    public function massDestroy(MassDestroyClasseRequest $request)
    {
        Classe::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}