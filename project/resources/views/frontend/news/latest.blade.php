@section('title', 'Latest News')
@include('frontend/include/header')



<div class="container">
  <h1 class="big text-center" data-aos-duration="600" data-aos="fade-down" data-aos-delay="0">Latest News
  </h1>
  <div class="mw-600 mx-auto mt-30 f-22 color-heading text-center text-adaptive" data-aos-duration="600" data-aos="fade-down" data-aos-delay="300">
    {{config('app.name')}} Bring World News Combined Together Straight To You</div>

  @foreach($news->chunk(3) as $news_part)
  <div class="card-deck">
    @foreach($news_part as $news_item)
    <div class="card">
      <img class="card-img-top" src="{{$news_item->getImageUrl()}}" width="200" height="200" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">{{$news_item->title}}</h5>
        <p class="card-text">{{$news_item->description}}</p>
        <p class="card-text"><small class="text-muted">Last updated: {{date('d M Y H:i', strtotime($news_item->article_dated))}}</small></p>
        <div class="card-footer" style="text-align: center;">
          <a href="{{$news_item->url}}" target="_new" class="btn lg action-3">Learn More</a>
        </div>
      </div>
    </div>
    @endforeach
  </div>

  @endforeach

    <div class="row ">
      <div class="col-md-6" style="float: right;">
      {{$news->appends(['query' => app('request')->input('query')])->links()}}

      </div>
    </div>




</div>

@include('frontend/include/footer')