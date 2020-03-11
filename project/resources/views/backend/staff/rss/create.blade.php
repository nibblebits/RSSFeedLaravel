@section('title', 'Creating New News Item')
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
            <li class="breadcrumb-item active">Add A New RSS Feed</li>

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
              <form action="{{url('manage/rss/create')}}" method="POST">
                {{ csrf_field() }}
                <h1>Add A New RSS Feed</h1>

                <div class="form-group">
                  <label>URL</label>
                  <input type="text" class="form-control" name="url" value="{{old('url')}}" />
                  <p class="text-danger">
                    {{$errors->first('url')}}
                  </p>
                </div>

                <div class="form-group">
                  <label>Categories To Pull Into</label>
                  <select name="categories[]" id="categories" multiple class="form-control">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" {{old('category') && in_array($category->id, old('category')) ? 'selected' : ''}}>{{$category->name}}</option>
                    @endforeach
                  </select>
                  <p class="text-danger">
                    {{$errors->first('categories')}}
                  </p>
                </div>


                <div class="form-group">
                  <input type="submit" class="btn btn-primary" value="Add RSS Feed" />
                </div>
              </form>
            </div>
          </div>


        </div>
      </div>

  </section>
  <!-- /.content -->
</div>

@include('backend/include/footer')