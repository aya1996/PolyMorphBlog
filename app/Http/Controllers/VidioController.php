<?php

namespace App\Http\Controllers;

use App\Models\Vidio;
use Illuminate\Http\Request;

class VidioController extends Controller
{
    public function index()
    {
        $Vidio = Vidio::all();
        return $this->handleResponse($Vidio, 'Vidios have been retrieved!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attr = $request->validate([
            'title' => 'required|string',




        ]);
        $user = Vidio::create([
            'title'      => $attr['title'],


        ]);

        $response = [
            'Vidio'    => $user->only(['id', 'title']),

        ];
        return response($response, 201);
    }

    public function createTag(Request $request)
    {

        $attr = $request->validate([
            'tag_id' => 'required|integer|exists:tags,id',
            'vidio_id'  => 'required|integer|exists:vidios,id',
        ]);
        $vidio = Vidio::find($attr['vidio_id']);
        if (!$vidio) {
            return response(['message' => 'vidio not found'], 404);
        }

        $vidio->tags()->create([
            'tag_id'      => $attr['tag_id'],

        ]);


        $response = [
            'tag'     => $vidio->only(['tag_id', 'vidio_id']),

        ];
        return response($response, 201);
    }
    public function getvidios()
    {
        $vidios = Vidio::with(['tags'])->get();
        return $this->handleResponse($vidios, 'vidios have been retrieved!');
    }
}
