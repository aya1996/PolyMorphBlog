<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $Tag = Tag::all();
        return $this->handleResponse($Tag, 'Tags have been retrieved!');
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
            'name' => 'required|string',




        ]);
        $user = Tag::create([
            'name'      => $attr['title'],


        ]);

        $response = [
            'Tag'    => $user->only(['id', 'name']),

        ];
        return response($response, 201);
    }
}
