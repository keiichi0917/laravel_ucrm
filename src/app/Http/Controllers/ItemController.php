<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Models\Item;
use Inertia\Inertia;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Items/Index', [
            'items' => Item::select('id', 'name', 'price', 'is_selling')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Items/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemRequest $request)
    {
        Item::create([
            'name' => $request->name,
            'memo' => $request->memo,
            'price' => $request->price

        ]);

        return to_route('items.index')
            ->with([
                'message' => '登録しました。',
                'status' => 'success' //追記
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return Inertia::render(
            'Items/Show',
            [
                'item' => $item
            ]
        );
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        return Inertia::render(
            'Items/Edit',
            [
                'item' => $item
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        // dd($item->name, $request->name);
        $item->name = $request->name;
        $item->memo = $request->memo;
        $item->price = $request->price;
        $item->is_selling = $request->is_selling;
        $item->save();

        return to_route('items.index')
            ->with([
                'message' => '更新しました。',
                'status' => 'success' //追記
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return to_route('items.index')
            ->with([
                'message' => '削除しました。',
                'status' => 'danger'
            ]);
    }
}
