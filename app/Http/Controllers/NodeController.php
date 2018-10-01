<?php

namespace App\Http\Controllers;

use App\Screen;
use App\Events\ScreenConnected;

class NodeController extends Controller
{
    public function node(Screen $screen)
    {
        $contents = $screen->activeContents->pluck('content_url');

        event(new ScreenConnected($screen));

        return view('screens.node.basic', compact('screen', 'contents'));
    }

    public function landing()
    {
        $clientIp = request()->ip();

        if ($screen = Screen::ip($clientIp)->first()) {
            return redirect()->route('screenfront', [$screen]);
        } else {
            return view('screens.node.landing', compact('clientIp'));
        }
    }
}
