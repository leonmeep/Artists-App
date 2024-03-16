<?php

namespace App\Http\Controllers;

use App\Models\Artist;

class ArtistController extends Controller
{
    public function getAll()
    {
        $artists = Artist::all();

        return response($artists);
    }

    public function getSingle(int $id)
    {
        $artist = Artist::find($id);

        return response($id);
    }
}
