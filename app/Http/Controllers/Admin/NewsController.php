<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Models\News;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {

        return view('admin.index',[
            'news'=> News::paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(News $news)
    {
        return view('admin.addnews',[
            'categories'=> Category::all(),
            'news'=> $news
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NewsRequest $request
     * @param News $news
     * @return RedirectResponse
     */
    public function store(NewsRequest $request, News $news)
    {
        return $this->newsEditCreate($request, $news);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param News $news
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(News $news)
    {
        return view('admin.addNews', [
            'news' => $news,
            'categories' =>  Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param NewsRequest $request
     * @param News $news
     * @return RedirectResponse
     */
    public function update(NewsRequest $request, News $news)
    {
        return $this->newsEditCreate($request, $news);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param News $news
     * @return Application|RedirectResponse|Redirector
     * @throws Exception
     */
    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('admin.index');

    }

    private function newsEditCreate($request, $news){
        $request->validated();

        $url = null;
        if ($request->file('image')) {
            $path = Storage::putFile('public', $request->file('image'));
            $url = Storage::url($path);
        }

        $news->image = $url;
        $news->isPrivate = isset($request->isPrivate);
        $news->fill($request->all())->save();

        $category = Category::query()->where('id',$news->category_id)->first();
        return redirect()->route('category.news.show', [$category->slug, $news->id]);
    }
}
