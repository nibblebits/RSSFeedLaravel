@section('title', 'News')
@include('backend/include/header')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>RSS Feed's</h1>
          <a href="{{url('manage/rss/create')}}" class="btn btn-primary">Create New</a>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">RSS Feeds</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      @if(session('success'))

      <div class="alert alert-success" role="alert">
        <h1>{{session('success')}}</h1>
      </div>

      @endif

      @if($errors->any())
      <div class="alert alert-danger" role="alert">
        <h1>{{$errors->first()}}</h1>
      </div>
      @endif

      <!-- /.row -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <p class="text-muted">
                All the RSS feeds in the system can be managed from here, each RSS feed will get polled periodically, creating new news for the system automatically
              </p>
            </div>

            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
            
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Logo</th>
                    <th>Processing State</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>

                  @foreach($rss_feeds as $rss_feed)
                  <tr>
                    <td><a href="#">{{$rss_feed->name}}</a></td>
                    <td>{{substr($rss_feed->description, 0, 120)}}</td>
                    <td><img src="{{substr($rss_feed->getImageUrl(), 0, 120)}}" width="200" height="100"/></td>
                    @if($rss_feed->processing_state == 'processed')
                    <td>{{$rss_feed->processing_state}}</td>

                    @elseif($rss_feed->processing_state == 'failed')
                    <td style="color: red;">{{$rss_feed->processing_state}}</td>

                    @else
                    <td style="color: orange;">{{$rss_feed->processing_state}}</td>

                    @endif
                    <td><a href="{{$rss_feed->url}}" target="_new"><i class="fas fa-eye"></a></td>
                    <td><a href="#"><i class="fas fa-hammer"></a></td>
                  </tr>
                  @endforeach

                </tbody>
              </table>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              {{$rss_feeds->appends(['query' => app('request')->input('query')])->links()}}
            </div>


          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>


@include('backend/include/footer')


