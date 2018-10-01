<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Screen;
use App\Content;
use App\Events\SendActiveContentsList;

class ScreenContentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Screen $screen)
    {
        $contents = Content::pluck('name', 'id');
        $screens = Screen::pluck('name', 'id');

        return view('screens.manage.surface.contents', compact('screen', 'contents', 'screens'));
    }

    public function update(Screen $screen, Content $content)
    {
        $contentId = request()->contents;

        $screen->contents()->syncwithoutDetaching($contentId);

        $contents = $screen->fresh()->activeContents;

        event(new SendActiveContentsList($screen, $contents));

        return back()->with('flash', 'This Displays Content has been updated!');
    }

    public function destroy(Screen $screen, Content $content)
    {
        $content->screens()->detach($screen);

        $contents = $screen->fresh()->activeContents;

        event(new SendActiveContentsList($screen, $contents));

        if (request()->expectsJson()) {
            return response(['status' => 'Item Removed']);
        }

        return back()->with('flash', 'Content Removed from this display!');
    }
}
