<?php

namespace App\Http\Controllers;

use App\Mail\NewArticleMail;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->get();
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'technique' => 'required|string|max:100',
            'description' => 'required|string',
            'img' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        if ($request->hasFile('img')) {
            $validated['img'] = $request->file('img')->store('articles', 'public');
        }

        $article = Article::create($validated);

        Mail::to('curatore@disegni-arte.test')->send(new NewArticleMail($article));

        return redirect()->route('articles.index')->with('success', 'Disegno pubblicato e notifica inviata!');
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'technique' => 'required|string|max:100',
            'description' => 'required|string',
            'img' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        if ($request->hasFile('img')) {
            if ($article->img) {
                Storage::disk('public')->delete($article->img);
            }
            $validated['img'] = $request->file('img')->store('articles', 'public');
        }

        $article->update($validated);

        return redirect()->route('articles.index')->with('success', 'Disegno aggiornato con successo!');
    }

    public function destroy(Article $article)
    {
        if ($article->img) {
            Storage::disk('public')->delete($article->img);
        }

        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Disegno eliminato.');
    }
}