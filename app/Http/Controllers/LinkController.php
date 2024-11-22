<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLinkRequest;
use App\Http\Requests\UpdateLinkRequest;
use App\Models\Link;
use Illuminate\Database\Eloquent\Model;

class LinkController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('links.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLinkRequest $request)
    {
        Model::unguard(true);
        $user = auth()->user();
        $user->links()->create($request->validated());

        return to_route('dashboard');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Link $link)
    {
        return view('links.edit', compact('link'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLinkRequest $request, Link $link)
    {
        Model::unguard(true);
        $link->fill($request->validated())
            ->save();

        return to_route('dashboard')->with('message', 'Link atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Link $link)
    {
        $link->delete();

        return to_route('dashboard')->with('message', 'Link deletado com sucesso');
    }

    public function up(Link $link)
    {
        Model::unguard(true);

        $link->moveUp();

        return back();
    }

    public function down(Link $link)
    {
        Model::unguard(true);
        $link->moveDown();

        return back();
    }
}
