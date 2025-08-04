<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFavoriteRequest;
use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index(Request $request)
    {
        if ($request->get('genre_ids')) {
            $genreIds = array_map('intval', explode(',', $request->get('genre_ids')));

            return Favorite::whereJsonContains('genre_ids', $genreIds)->orderBy('id', 'desc')->paginate(20);
        }

        return Favorite::orderBy('id', 'desc')->paginate(20);
    }
    public function store(StoreFavoriteRequest $request)
    {
        $data = $request->validated();

        Favorite::create($data);

        return response()->json(['success' => 'true']);
    }

    public function destroy($id)
    {
        $favorite = Favorite::findOrFail($id);

        if ($favorite) {
            $favorite->delete();
        }
    }
}
