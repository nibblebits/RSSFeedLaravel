<?php

namespace App\Console\Commands;

use App\Jobs\PullRss;
use App\RssFeed;
use Illuminate\Console\Command;

class PollRss extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rss:poll';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates jobs to poll all RSS feeds in this system';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $rss_feeds = RssFeed::all();
        foreach($rss_feeds as $rss_feed)
        {
            PullRss::dispatch($rss_feed);
        }
    }
}
