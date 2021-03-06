@section('title', $user->name . '\'s Profile')
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
            <li class="breadcrumb-item"><a href="{{url('user/' . $user->id)}}">{{$user->name}}</a></li>
            <li class="breadcrumb-item active">Change Password</li>

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
              <form action="{{url('user/' . $user->id . '/change_password')}}" method="POST">
                {{ csrf_field() }}
                <h1>Changing Password For {{$user->name}}</h1>
                <div class="form-group">
                  <label>New Password</label>
                  <input type="password" class="form-control" name="new_password" />
                  <p class="text-danger">{{$errors->first('new_password')}}</p>

                  <br />
                  <input type="submit" class="btn btn-primary" value="Change Password" />
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