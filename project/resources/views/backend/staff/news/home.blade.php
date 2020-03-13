@section('title', 'News')
@include('backend/include/header')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>News</h1>
          <a href="{{url('manage/news/create')}}" class="btn btn-primary">Create New</a>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">News</li>
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
                All the news in the system can be managed here
                <form action="{{url('manage/news')}}" id="filter_form" method="GET">
                  <div class="form-group">
                    <input type="text" class="form-control" name="query" placeholder="Enter a search criteria such as an email or name" value="{{app('request')->input('query')}}" />
                    <input type="submit" class="btn btn-primary" value="Search" />
                  </div>

                  <p class="text-muted">You can select a category if you want to narrow the search</p>
                  <div class="form-group">
                    <select name="category" id="category" class="form-control">
                      <option value="">Show All Categories</option>
                      @foreach($categories as $category)
                        <option value="{{$category->id}}" {{app('request')->input('category') == $category->id ? 'selected' : ''}} >Show Only {{$category->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </form>
              </p>
            </div>

            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
            
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>

                  @foreach($news as $news_item)
                  <tr>
                    <td><a href="{{url('manage/news/' . $news_item->id . '/edit')}}">{{$news_item->title}}</a></td>
                    <td>{{substr($news_item->description, 0, 120)}}</td>
                    <td><a href="#"><i class="fas fa-hammer"></a></td>
                  </tr>
                  @endforeach

                </tbody>
              </table>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              {{$news->appends(['query' => app('request')->input('query')])->links()}}
            </div>


          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>

<script>

$('#category').change(function() {
  $('#filter_form').submit();
});
</script>


@include('backend/include/footer')


