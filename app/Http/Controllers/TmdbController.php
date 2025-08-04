<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TmdbController extends Controller
{
    public function getMovies(Request $request)
    {
        $search = $request->query('search');
        $page   = $request->query('page') ?? 1;
        $path   = $search ? '/search/movie?query=' . $search . '&language=pt-br&page=' . $page :
            '/movie/popular?language=pt-br&page=' . $page;

        $response = Http::withToken(config('tmdb.api_token'))
            ->get(config('tmdb.api_url') . $path);

        return $response->json();
    }

    public function getGenres()
    {
        $response = Http::withToken(config('tmdb.api_token'))
            ->get(config('tmdb.api_url') . '/genre/movie/list?language=pt-br');

        return $response->json();
    }
}
