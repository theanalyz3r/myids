<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Screen;
use App\Content;
use App\Events\SendActiveContentsList;
use App\Events\SendFooterMessage;

class ScreensController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function pushActive(Screen $screen)
    {
        $contents = $screen->fresh()->activeContents;

        event(new SendActiveContentsList($screen, $contents));

        return redirect('/screens')
            ->with('flash', 'Active Contents Pushed');
    }

    public function pushFooter(Screen $screen)
    {
        $screen->footer_message = request('footer-message');
        $screen->save;

        event(new SendFooterMessage($screen));

        return redirect('/screens')
            ->with('flash', 'Active Contents Pushed');
    }

    public function index()
    {
        $screens = Screen::latest()->get();

        // dd($screens);
        return view('screens.manage.surface.index', compact('screens'));
    }

    public function show()
    {
        $screens = Screen::latest()->get();
        return view('screens.manage.surface.screenslist', compact('screens'));
    }

    public function create()
    {
        // Pass variable for content through for Multi Select in create screen dialog
        $contents = Content::latest()->get();
        return view('screens.manage.surface.forms.screen-add', compact('contents'));
    }

    public function store()
    {
        $this->validate(request(), [
                'name' => 'required|max:30',
                'systemref' => 'required|max:7',
                'location' => 'required|max:40'
            ]);

        $screen = new Screen;

        $screen->name = request('name');
        $screen->description = request('description');
        $screen->systemref = request('systemref');
        $screen->ip = request('ip');
        $screen->footer_message = request('footer-message');
        $screen->location = request('location');
        $screen->user_id = auth()->id();
        $screen->default_content_id = request('default_content_select', 1);

        $screen->save();

        session()->flash('message', 'Screen Created!');
        // TODO: 'ScreenCreated Event should fire here' - possible notification from this also.

        return redirect('/screens');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Content $content
     * @return \Illuminate\Http\Response
     */
    public function edit(Screen $screen)
    {
        $contents = $screen->fresh()->contents;

        return view('screens.manage.surface.forms.screen-edit', compact('screen', 'contents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Screen $screen)
    {
        $this->validate(request(), [
            'name' => 'required|max:30',
            'systemref' => 'required|max:7',
            'location' => 'required|max:40'
        ]);

        $input = $request->all();

        $screen->fill($input);

        $screen->save();

        return redirect('/screens')
            ->with('flash', 'Screen Settings Successfully Modified');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $screen = Screen::find($id);
        $screen->delete();

        return redirect('/screens');
    }
}
