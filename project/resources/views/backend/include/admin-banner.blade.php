@if($user_controlled_by_admin)
<div class="bg-secondary" style="position: relative; z-index: 10000; width:100%;">
    <img src="{{url('dist/img/logo.png')}}" width="100" />

    <form action="{{url('/admin/restore_to_admin')}}" method="POST" style="display: inline;">
        {{ csrf_field() }}
        <input type="submit" class="btn btn-lg btn-success" style="float: right; margin: 5px 10px 0px;" name="backToAdminBtn" value="Back To Admin" />
    </form>
</div>
@endif