<?php

namespace App\Http\Controllers\Backend\Staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateRssFeedRequest;
use App\Http\Requests\UpdateRssFeedRequest;
use App\Jobs\PullRss;
use App\NewsCategory;
use App\RssFeed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RssController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }


    public function index(Request $request)
    {
        $rss_feeds = RssFeed::paginate(10);
        return view('backend.staff.rss.home', ['rss_feeds' => $rss_feeds]);
    }


    public function create()
    {
        $categories = NewsCategory::orderBy('name', 'asc')->get();
        return view('backend.staff.rss.create', ['categories' => $categories]);
    }

    public function edit(RssFeed $rss_feed)
    {
        $categories = NewsCategory::orderBy('name', 'asc')->get();
        $rss_feed->load('categories');

        return view('backend.staff.rss.edit', ['rss_feed' => $rss_feed, 'categories' => $categories]);
    }

    public function update(RssFeed $rss_feed, UpdateRssFeedRequest $request)
    {
        $rss_feed->categories()->detach();
        foreach ($request->categories as $category) {
            $rss_feed->categories()->attach($category);
        }
        return Redirect::to('manage/rss')->withSuccess('Updated succesfully');
    }

    public function delete(RssFeed $rss_feed)
    {
        $rss_feed->categories()->detach();
        $rss_feed->delete();
        return Redirect::to('manage/rss')->withSuccess('RSS feed deleted');
    }

    public function store(CreateRssFeedRequest $request)
    {
        $rss_feed = RssFeed::create($request->only(['url', $request->url]));
        PullRss::dispatch($rss_feed);

        foreach ($request->categories as $category) {
            $rss_feed->categories()->attach($category);
        }

        return Redirect::to('manage/rss')->withSuccess('Rss item added!')->withInput();
    }
}
