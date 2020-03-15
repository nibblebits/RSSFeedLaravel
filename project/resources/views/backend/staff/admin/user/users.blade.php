@section('title', 'Users')
@include('backend/include/header')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Users</h1>
          <a href="{{url('users/create')}}" class="btn btn-primary">Create New</a>

        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
            <li class="breadcrumb-item active">Users</li>
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
              All the users in the system, you can manage them here.
              <form action="{{url('users')}}" method="GET">
              <div class="form-group">
                <input type="text" class="form-control" name="query" placeholder="Enter a search criteria such as an email or name" value="{{app('request')->input('query')}}"/>
                <input type="submit" class="btn btn-primary" value="Search" />
              </div>
              </form>
              </p>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Account Type</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($users as $user)
                    <tr>
                      <td><a href="{{url('user/' . $user->id)}}">{{$user->name}}</a></td>
                      <td>{{$user->account_type}}</td>
                    </tr>
                  @endforeach
                   
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                {{$users->appends(['query' => app('request')->input('query')])->links()}}
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