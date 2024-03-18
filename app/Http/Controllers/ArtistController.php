<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function getAll(Request $request)
    {
        $search = $request->search;
        $hidden = ['created_at', 'updated_at'];

        if ($search) {
            return response()->json([
                'message' => 'Artists returned.',
                'data' => Artist::where('name', 'LIKE', "%$search%")->get()->makehidden($hidden),
            ]);
        }

        return response()->json([
            'message' => 'Artists returned.',
            'data' => Artist::all()->makeHidden($hidden),
        ]);

    }

    public function getSingle(int $id)
    {
        return response()->json([
            'message' => 'Artist returned',
            'data' => Artist::find($id),
        ]);
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
            return response()->json([
                'message' => 'Error, the Artist could not be created.',
            ], 500);
        }

        return response()->json([
            'message' => 'Artist has been successfully created.',
        ], 201);
    }

    public function update(int $id, Request $request)
    {
        $request->validate([
            'name' => 'required|max:100|string',
            'dob' => 'required|date',
            'country_of_birth' => 'required|max:100|string',
            'medium' => 'max:100|string',
            'movement' => 'max:300|string',
            'country_of_death' => 'max:100|string',
        ]);

        $artist = Artist::find($id);
        if (! $artist) {
            return response()->json([
                'message' => 'Error, the Artist id is invalid.',
            ], 404);
        }
        $artist->name = $request->name;
        $artist->dob = $request->dob;
        $artist->country_of_birth = $request->country_of_birth;
        $artist->medium = $request->medium;
        $artist->movement = $request->movement;
        $artist->country_of_death = $request->country_of_death;

        if (! $artist->save()) {
            return response()->json([
                'message' => 'Error, update has not been saved.',
            ], 500);

        }

return response()->json([
            'message' => 'The Artist has been successfully updated.',
        ]);
    }

    public function delete(int $id)
    {
        $artist = Artist::find($id);
        if (! $artist) {
            return response()->json([
                'message' => 'Error, the Artist id is invalid.',
            ], 400);
        }
        $artist->delete();

        return response()->json([
            'message' => 'The Artist has successfully been deleted.',
        ], 201);
    }
}
