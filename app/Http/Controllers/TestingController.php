<?php

namespace App\Http\Controllers;

use App\testing;
use Illuminate\Http\Request;


class TestingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = testing::all()->toArray();
        return array_reverse($books);
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
        $data=new testing();
        $data->name=$request->name;
        $data->email=$request->email;
        $data->password=$request->password;
        $data->save();
        return response()->json([
            'status'=>'Registration successfull'
        ],200);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\testing  $testing
     * @return \Illuminate\Http\Response
     */
    public function show(testing $testing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\testing  $testing
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book=testing::find($id);
        return response()->json($book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\testing  $testing
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $book=testing::find($id);
        $book->name=$request->name;
        $book->email=$request->email;
        $book->password=$request->password;
        $book->save();
        return response()->json("done");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\testing  $testing
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book=testing::find($id);
        $book->delete();
        return response()->json('deleted');
    }
    public function login(Request $request)
    {
        $data = testing::where('email', $request->email)->get();
        if($data->isempty())
        {
            return response()->json([
                'msg'=>'incorrect email'
         ],400);
        }
        else{
            if($data[0]->password == $request->input('password'))
        {
             return response()->json([
              'msg'=>'correct',
              'username'=>$data[0]->name
             ],200);
         }
         else{
    
            return response()->json([
                'msg'=>'incorrect'
         ],400);
         }
        }
        }
      
    
}
