<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Screen;
use App\Content;
use App\Events\SendActiveContentsList;

class ContentStatusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Screen $screen, Content $content)
    {
        $contentId = $content->id;

        $screen->activateContent($contentId);

        $contents = $screen->fresh()->activeContents;

        event(new SendActiveContentsList($screen, $contents));

        if (request()->expectsJson()) {
            return response([
                'message' => 'Content Activated'
            ]);
        }

        return;
    }

    public function destroy(Screen $screen, Content $content)
    {
        $contentId = $content->id;

        $screen->deactivateContent($contentId);

        $contents = $screen->fresh()->activeContents;

        event(new SendActiveContentsList($screen, $contents));

        if (request()->expectsJson()) {
            return response([
                'status' => 'Content Deactivated'
            ]);
        }

        return;
    }
}
