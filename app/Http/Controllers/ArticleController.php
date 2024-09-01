<?php

namespace App\Http\Controllers;

use App\DataTables\ArticleDataTable;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\MasterData\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ArticleDataTable $articleDataTable)
    {
        return $articleDataTable->render('page.article.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('page.article.article-form', [
            'data' => new Article(),
            'tags' => Tag::all(),
            'action' => route('articles.store'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request, Article $article)
    {
        DB::beginTransaction();
        try {
            $article->fill($request->validated());
            $article->slug = \Illuminate\Support\Str::slug($request->title);
            $article->save();

            $article->tags()->sync($request->tags);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return responseError($th);
        }

        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $article->load('tags');

        return view('page.article.article-form', [
            'data' => $article,
            'tags' => Tag::all(),
            'action' => null,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $article->load('tags');

        return view('page.article.article-form', [
            'data' => $article,
            'tags' => Tag::all(),
            'action' => route('articles.update', $article->id),
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleRequest $request, Article $article)
    {
        DB::beginTransaction();
        try {
            $article->fill($request->validated());
            $article->save();

            $article->tags()->sync($request->tags);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return responseError($th);
        }

        return responseSuccess(true);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}
