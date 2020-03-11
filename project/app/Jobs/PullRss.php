<?php

namespace App\Jobs;

use App\News;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\RssFeed;
use Exception;
use Nibblebits\RssFeedReader\Reader as RssReader;
class PullRss implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $feed;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(RssFeed $feed)
    {
        $this->feed = $feed;
    }

    public function failed(Exception $exception)
    {
        $this->feed->processing_state = 'failed';
        $this->feed->save();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->feed->processing_state = 'processing';
        $this->feed->save();

        $rss_reader = new RssReader();
        $result = $rss_reader->load($this->feed->url);
        $channel = $result->getChannel();

        // Let's update the RSS feed title, description and image so our records are up to date
        $this->feed->name = $channel->getTitle();
        $this->feed->description = substr(strip_tags($channel->getDescription()), 0, 255);
        $this->feed->image_url = $channel->getImage()->getUrl();
        $this->feed->save();

        $items = $channel->getItems();
        foreach($items as $item)
        {
            $url = $item->getLink();
            if(News::where('url', $url)->exists())
            {
                // We already have this in the database lets skip
                continue;
            }

            $news = new News();
            $news->title = strip_tags($item->getTitle());
            $news->description = substr(strip_tags($item->getDescription()), 0, 255);
            $article_image = $item->fetchArticleImage();
            if ($article_image)
            {
                $news->image_url = $article_image->getUrl();
            }
            $news->article_dated = date('Y-m-d H:i:s', strtotime($item->getDated()));
            $news->url = $url;
            $news->save();
        }

        $this->feed->processing_state = 'processed';
        $this->feed->save();

    }
}
