@section('title', $news->title)
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
            <li class="breadcrumb-item">News</li>
            <li class="breadcrumb-item active">{{$news->title}}</li>


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
              <form action="{{url('manage/news/' . $news->id . '/edit')}}" method="POST">
                {{ csrf_field() }}
                <h1>{{$news->title}}</h1>
                <div class="form-group">
                  <label>Title</label>
                  <input type="text" class="form-control" name="title" value="{{old('title', $news->title)}}" />
                  <p class="text-danger">
                    {{$errors->first('title')}}
                  </p>
                </div>
                <div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control" name="description">{{old('description', $news->description)}}</textarea>
                  <p class="text-danger">
                    {{$errors->first('description')}}
                  </p>
                </div>

                <div class="form-group">
                  <label>URL</label>
                  <input type="text" class="form-control" name="url" value="{{old('url', $news->url)}}" />
                  <p class="text-danger">
                    {{$errors->first('url')}}
                  </p>
                </div>

                <div class="form-group">
                  <label>Image URL</label>
                  <input type="text" class="form-control" name="image_url" value="{{old('image_url', $news->image_url)}}" />
                  <p class="text-danger">
                    {{$errors->first('image_url')}}
                  </p>
                </div>

                <div class="form-group">
                  <label>Categories</label>
                  <select name="categories[]" id="categories" multiple class="form-control">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" {{$news->categories->contains('id', $category->id) ? 'selected' : ''}}>{{$category->name}}</option>
                    @endforeach
                  </select>
                  <p class="text-danger">
                    {{$errors->first('categories')}}
                  </p>
                </div>


                <div class="form-group">
                  <input type="submit" class="btn btn-primary" value="Update" />

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