@section('title', $rss_feed->name)
@include('backend/include/header')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{url('manage/rss')}}">RSS Feeds</a></li>
            <li class="breadcrumb-item active">{{$rss_feed->name}}</li>

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
      <div class="card">
        <div class="card-body">

          <div class="row">
            <div class="col-md-6">
              <form id="delete_form" action="{{url('manage/rss/' . $rss_feed->id . '/edit')}}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
              </form>

              <form action="{{url('manage/rss/' . $rss_feed->id . '/edit')}}" method="POST">
                {{ csrf_field() }}
                <h1>{{$rss_feed->name}}</h1>


                <div class="form-group">
                  <p class="text-muted">When we poll for RSS feeds we will feed the news into the following categories</p>
                  <label>Categories To Pull Into</label>
                  <select name="categories[]" id="categories" multiple class="form-control">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" {{$rss_feed->categories->contains('id', $category->id) ? 'selected' : ''}}>{{$category->name}}</option>
                    @endforeach
                  </select>
                  <p class="text-danger">
                    {{$errors->first('categories')}}
                  </p>
                </div>


                <div class="form-group">
                  <input type="submit" class="btn btn-primary" value="Update" />
                  <button type="button" class="btn btn-danger" onclick="deleteItem();"><i class="far fa-trash-alt"></i></button>
                </div>
              </form>
            </div>
          </div>


        </div>
      </div>

  </section>
  <!-- /.content -->
</div>

<script>
  function deleteItem() {
    var c = confirm('Are you sure you wish to delete this RSS feed?');
    if (c) {
      $('#delete_form').submit();
    }
  }
</script>

@include('backend/include/footer')