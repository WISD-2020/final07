<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class AdminRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

//        //換頁
//        $room= Room::paginate(5);
//        //把最後一筆資料的id抓出來
//        $lastid=0;
//        if($room==""){
//            $lastid=0;
//        }else{
//            $lastid=$room->id;
//        }
//
//        $data=[ 'lastid'=>$lastid , 'chgpage'=>$chgpage ];
        $rooms=Room::orderBy('created_at','DESC')->get();
        $data=['rooms'=>$rooms];
        return view('admin.rooms.index', $data,);
    }

    /**
     * Show the form for creating a new resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.rooms.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $room = new Room;
//        $room->type = $request->input("type");
//        $room->people = $request->input("people");
//        $room->price = $request->input("price");
//        $room->remark = $request->input("remark");
//        $room->save();

        Room::create($request->all());

        return redirect()->route('admin.rooms.create');
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
        $data = ['id' => $id];

        return view('admin.posts.edit', $data);
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
