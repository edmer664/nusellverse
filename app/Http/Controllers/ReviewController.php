<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request, Store $store)
    {
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:500',
        ]);

        $store->reviews()->create([
            'rating' => $validated['rating'],
            'comment' => $validated['comment'],
            'ip_address' => $request->ip(),
        ]);

        $store->update([
            'rating' => $store->reviews()->avg('rating')
        ]);

        return back()->with('success', 'Review submitted successfully!');
    }
}
