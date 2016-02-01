<?php

namespace App\Http\Controllers;

use App\Event;
use App\Category;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Carbon\Carbon;

use Session;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event = new Event;
        $events = $event->orderBy('name')->get();
        return view('dashboard/events')->with('events', $events)->with('event', new Event);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = new Category;
        $categories = $category->orderBy('name')->get();
        return view('dashboard/create_event')->with('categories', $categories)->with('event', new Event);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = new Event;
        $event->is_published = ($request->get('is_published') == 'on' ? 1 : 0);
        $event->name = $request->event_name;
        $event->description = $request->event_description;
        $event->datetime = Carbon::parse($request->event_datetime);
        $event->save();
        if ($request->get('event_categories') != null){
            foreach ($request->get('event_categories') as $category_id) {
                $event->categories()->attach($category_id);
            }
        }

        $category = new Category;
        $categories = $category->orderBy('name')->get();
        return view('dashboard/create_event')->with('categories', $categories)->with('event', new Event);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function multiple_delete(Request $request)
    {
        Product::destroy($request->ids);
        $response = ['model_type' => 'Product', 'ids' => $request->ids];
        return json_encode($response);
    }
}
?>