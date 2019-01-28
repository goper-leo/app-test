<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Passer;

class PassersController extends Controller
{
    /**
     * Fetch passers info's
     *
     * @return Response
     */
    public function index()
    {
        $passers = Passer::all();

        return response()->json(compact('passers'));
    }

    /**
     * Search passers by name
     *
     * @param  string $key
     * @return response
     */
    public function search($key)
    {
        $passers = Passer::where('name', 'like', $key)->paginate(10);

        return response()->json(compact('passers'));
    }
}
