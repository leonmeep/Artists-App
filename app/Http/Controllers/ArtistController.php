<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function getAll()
    {
        $artists = Artist::all();

        return $artists;
    }

    public function getSingle(int $id)
    {
        $artist = Artist::find($id);

        return $artist;
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100|string',
            'dob' => 'required|date',
            'country_of_birth' => 'required|max:100|string',
            'medium' => 'max:100|string',
            'movement' => 'max:300|string',
            'country_of_death' => 'max:100|string',
        ]);

        $artist = new Artist();

        $artist->name = $request->name;
        $artist->dob = $request->dob;
        $artist->country_of_birth = $request->country_of_birth;
        $artist->medium = $request->medium;
        $artist->movement = $request->movement;
        $artist->country_of_death = $request->country_of_death;

        if (! $artist->save()) {
            return response('Artist could not be created.');
        }

        return response('Artist Created.');
    }

    public function update(int $id, Request $request)
    {
        $request->validate([
            'name' => 'required|max:100|string',
            'dob' => 'required|date',
            'country_of_birth' => 'required|max:100|string',
            'medium' => 'max:100|string',
            'movement' => 'max:300|string',
            'country_of_death' => 'max:100|string']);

        $artist = Artist::find($id);
        if (! $artist) {
            return response('Error, invalid artist id');
        }
        $artist->name = $request->name;
        $artist->dob = $request->dob;
        $artist->country_of_birth = $request->country_of_birth;
        $artist->medium = $request->medium;
        $artist->movement = $request->movement;
        $artist->country_of_death = $request->country_of_death;

        if (! $artist->save()) {
            return response('Artist could not be updated.');
        }

        return response('Artist Updated.');
    }

    public function delete(int $id)
    {
        $artist = Artist::find($id);
        if (! $artist) {
            return response('Error, invalid artist id.');
        }
        $artist->delete();

        return response('The artist has been deleted.');
    }
}
