<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Content;
use App\Screen;
use Carbon\Carbon;

class ContentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currContents = Content::inDateContent()->with(['screens', 'user'])->get();
        $expContents = Content::ExpiredContent()->with(['screens', 'user'])->get();

        return view('screens.manage.content.index', compact('currContents', 'expContents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $screens = Screen::pluck('name', 'id');
        return view('screens.manage.content.forms.content-add', compact('screens'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        // Validate Inputs
        $this->validate(request(), [
                'name' => 'required|max:30',
                'description' => 'required',
                // 'content_url' => 'image|mimes:jpeg,bmp,png',
                'content_url' => 'required',
                'starts_on' => 'required',
                'expires_on' => 'required',
            ]);

        $selScreens = request('screens');

        $content = new Content;
        $content->name = request('name');
        $content->description = request('description');

        $file = request()
                ->file('content_url')
                ->store('contents', 'public');

        $content->content_url = $file;
        $content->starts_on = Carbon::createFromFormat('D, jS F Y, g:i a', request()->starts_on);
        $content->expires_on = Carbon::createFromFormat('D, jS F Y, g:i a', request()->expires_on);
        $content->user_id = auth()->id();

        $content->save();
        $content->screens()->attach($selScreens);

        return back()
                ->with('flash', 'Content Saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Content $content)
    {
        if (request()->expectsJson()) {
            return response(['url' => 'content/']);
        }

        return view('screens.manage.content.show', compact('content'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Content $content
     * @return \Illuminate\Http\Response
     */
    public function edit(Content $content)
    {
        $screens = Screen::pluck('name', 'id');

        if (request()->expectsJson()) {
            return response(['url' => 'content/']);
        }

        return view('screens.manage.content.forms.content-edit', compact('content', 'screens'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Content $content)
    {
        $this->validate(request(), [
                'name' => 'required|max:30',
                'description' => 'required',
                'starts_on' => 'required',
                'expires_on' => 'required',
            ]);

        $input = $request->all();
        $input['starts_on'] = Carbon::createFromFormat('D, jS F Y, g:i a', request()->starts_on);
        $input['expires_on'] = Carbon::createFromFormat('D, jS F Y, g:i a', request()->expires_on);

        $content->fill($input);
        $content->screens()->sync(request()->get('screens'));

        $content->save();

        return redirect('/content')
                    ->with('flash', 'Content Successfully Modified');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $content = Content::find($id);
        $content->delete();

        return redirect('/content')
                ->with('flash', 'Content Removed');
    }
}
