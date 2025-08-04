<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFavoriteRequest;
use App\Http\Resources\FavoriteResource;
use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index(Request $request)
    {
        if ($request->genre_ids) {
            $genreIds = array_map('intval', explode(',', $request->genre_ids));

            return Favorite::whereJsonContains('genre_ids', $genreIds)->orderBy('id', 'desc')->paginate(20);
        }

        return Favorite::orderBy('id', 'desc')->paginate(20);
    }

    public function store(StoreFavoriteRequest $request)
    {
        $data = $request->validated();

        $favorite = Favorite::create($data);

        return new FavoriteResource($favorite);
    }

    public function destroy($id)
    {
        $favorite = Favorite::findOrFail($id);

        $favorite->delete();

        return response(null, 204);
    }
}
