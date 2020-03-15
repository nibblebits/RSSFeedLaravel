@section('title', 'Categories')
@include('backend/include/header')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>News</h1>
          <a href="{{url('manage/category/create')}}" class="btn btn-primary">Create New</a>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">Categories</li>
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
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
            
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Title</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>

                  @foreach($categories as $category)
                  <tr>
                    <td><a href="{{url('manage/category/' . $category->id . '/edit')}}">{{$category->name}}</a></td>
                    <td><a href="{{url('manage/category/' . $category->id . '/edit')}}"><i class="fas fa-edit"></a></td>
                  </tr>
                  @endforeach

                </tbody>
              </table>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              {{$categories->appends(['query' => app('request')->input('query')])->links()}}
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


