<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\InertiaTest;

class InertiaTestController extends Controller
{
    /**
     * 一覧表示
     */
    public function index()
    {
        $items = InertiaTest::all();

        return Inertia::render('Inertia/Index', [
            'items' => $items,
        ]);
    }

    /**
     * 作成フォーム表示
     */
    public function create()
    {
        return Inertia::render('Inertia/Create');
    }

    /**
     * 詳細表示
     */
    public function show($id)
    {
        $item = InertiaTest::findOrFail($id);

        return Inertia::render('Inertia/Show', [
            'id' => $id,
            'item' => $item,
        ]);
    }

    /**
     * データ登録
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
        ]);

        InertiaTest::create($validated); // ← $fillable をモデルに定義している前提

        return to_route('inertia.index')->with('message', '登録しました');
    }
}
