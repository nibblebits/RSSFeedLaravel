@section('title', 'Create A New User')
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
            <li class="breadcrumb-item"><a href="{{url('manage/categories')}}">Users</a></li>
            <li class="breadcrumb-item active">Create</li>
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
              <form action="{{url('users/create')}}" method="POST">
                {{ csrf_field() }}
                <h1>Create A New User</h1>
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" class="form-control" name="name" value="{{old('name')}}" />
                  <p class="text-danger">
                    {{$errors->first('name')}}
                  </p>
                </div>

                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" name="email" value="{{old('email')}}" />
                  <p class="text-danger">
                    {{$errors->first('email')}}
                  </p>
                </div>
                <div class="form-group">
                  <input type="submit" class="btn btn-primary" value="Create User" />
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