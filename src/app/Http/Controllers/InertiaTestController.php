<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\InertiaTest;
//use Illuminate\Support\Facades\Log;

class InertiaTestController extends Controller
{
    public function index()
    {
        return Inertia::render('Inertia/Index');
    }

    public function show($id)
    {
        // dd($id);
        return Inertia::render(
            'Inertia/Show',
            [
                'id' => $id
            ]
        );
    }

    public function store(Request $request)
    {
 //       Log::info('store() に送られてきたデータ', $request->all());
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $inertiaTest = new InertiaTest;
        $inertiaTest->title = $validated['title'];
        $inertiaTest->content = $validated['content'];
        $inertiaTest->save();

        return to_route('inertia.index');
    }
}
