@include('dashboard/include/admin-banner')

@if(Auth::user()->account_type == 'technician')
@include('dashboard/technician/include/header')
@elseif(Auth::user()->account_type == 'employer')
@include('dashboard/employer/include/header')
@elseif(Auth::user()->account_type == 'admin')
@include('dashboard/admin/include/header')
@else
Invalid account type
@endif