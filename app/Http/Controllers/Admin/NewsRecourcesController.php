<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResourceRequest;
use Illuminate\Http\Request;
use App\Models\Resource as Resources;

class NewsRecourcesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('admin.newsResources',[
            'resources'=> Resources::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Resources $resource)
    {
        return view('admin.resourcesEdit',[
            'item'=> $resource
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Resource $item
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ResourceRequest $request, Resources $resource)
    {
        $this->modifyResource($request,$resource);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show()
    {
//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        return view('admin.resourcesEdit',[
            'item'=> Resources::where('id', $id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Resources $item
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ResourceRequest $request, Resources $resource)
    {

        return $this->modifyResource($request,$resource);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Resource $item
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Resources $resource)
    {
        $resource->delete();
        return redirect()->route('admin.resources.index');
    }

    private function modifyResource($request,$item){
        parent::validateRequest($request);

        $item->fill($request->all())->save();

        return redirect()->route('admin.resources.index');
    }
}
