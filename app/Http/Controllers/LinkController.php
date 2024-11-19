<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Http\Requests\StoreLinkRequest;
use App\Http\Requests\UpdateLinkRequest;

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
    public function edit($id)
    {
        $link = Link::query()->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(UpdateLinkRequest $request, Link $link)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Link $link)
    {
        //
    }
}
