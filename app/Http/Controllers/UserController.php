<?php

namespace App\Http\Controllers;

use App\Transformers\UserTransformer;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use LucaDegasperi\OAuth2Server\Authorizer;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('api.auth');
    }

    /**
     * This method will validate a user based on the access token.
     * @return mixed
     */
    public function validateUser()
    {
        $user = app('Dingo\Api\Auth\Auth')->user();
        if (!$user) {
            $responseArray = ['message' => 'Not authorized. Please login again', 'status' => false];
            return $this->response->array($responseArray)->setStatusCode(403);
        } else {
            $responseArray = ['message' => 'User is authorized', 'status' => true];
            return $this->response->array($responseArray)->setStatusCode(200);
        }
    }

    /**
     * Display a listing of the resource.
     * Passing all the details of the users to Transformer(UserTransformer)
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $projectsArray = User::all();
        return $this->response->collection($projectsArray, new UserTransformer())->setStatusCode(200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
