@section('title', 'World News Happening Right Now')
@include('frontend/include/header')



<div class="container">
  <div class="mb-3 logo d-block d-xl-none text-center logo_mobile">Kiwi News</div>
  <h1 class="big text-center" data-aos-duration="600" data-aos="fade-down" data-aos-delay="0">World News Of Today
  </h1>
  <div class="mw-600 mx-auto mt-30 f-22 color-heading text-center text-adaptive" data-aos-duration="600" data-aos="fade-down" data-aos-delay="300">
    Kiwi News Bring World News Combined Together Straight To You</div>

  <div class="card-deck">
    @foreach($news as $news_item)
    <div class="card">
      <img class="card-img-top" src="{{$news_item->image_url}}" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">{{$news_item->title}}</h5>
        <p class="card-text">{{$news_item->description}}</p>
        <p class="card-text"><small class="text-muted">Last updated: {{date('d M Y H:i', strtotime($news_item->article_dated))}}</small></p>
        <div class="card-footer" style="text-align: center;">
          <a href="https://google.com" class="btn lg action-3">Learn More</a>
        </div>
      </div>
    </div>

    @endforeach



  </div>


</div>

@include('frontend/include/footer')