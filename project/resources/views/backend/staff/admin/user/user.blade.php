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
            <li class="breadcrumb-item active">Profile</li>
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
            <div class="col-md-10">
              <h1>{{$user->name}}</h1>

            </div>


            <div class="col-md-12">
              <hr />
            </div>
          </div>

          <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-10">
              {{$user->about_me}}
            </div>
          </div>

          <div class="row">
            <div class="col-md-2" style="text-align: center;">
              <p>
                Name: {{$user->name}}
              </p>
              <p>
                Email: <a href="mailto:{{$user->email}}">{{$user->email}}</a>
              </p>
              <form action="{{url('admin/login_to_account')}}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="user_id" value="{{$user->id}}" />
                <input type="submit" class="btn btn-success" value="Access Account" />
                <hr />
                <a href="{{url('user/' . $user->id . '/change_password')}}" class="btn btn-info">Change Password</a>

              </form>
              <hr />
              @if($user->banned)
              <form action="{{url('user/' . $user->id . '/unban')}}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="user_id" value="{{$user->id}}" />
                <input type="submit" class="btn btn-danger" value="Unban User" onclick="return confirm('Do you wish to unban this user?')" />

              </form>
              @else
              <form action="{{url('user/' . $user->id . '/ban')}}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="user_id" value="{{$user->id}}" />
                <input type="submit" class="btn btn-danger" value="Ban User" onclick="return confirm('Do you wish to ban this user?')" />

              </form>
              @endif
            </div>

          </div>


        </div>
      </div>

  </section>
  <!-- /.content -->
</div>

@include('backend/include/footer')