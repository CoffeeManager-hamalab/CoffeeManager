<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\Slack;
use App\Repositories\Slack\SlackRepositoryInterface AS SlackPepo;

class SampleController extends Controller
{
    public function index(SlackPepo $slackHook)
    {
        $slackHook->notify(new Slack('Slack meets Laravel!!'));
    }
}