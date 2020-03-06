@if(Auth::user()->account_type == 'technician')
@include('dashboard/technician/include/footer')
@elseif(Auth::user()->account_type == 'employer')
@include('dashboard/employer/include/footer')
@elseif(Auth::user()->account_type == 'admin')
@include('dashboard/admin/include/footer')
@else
Invalid account type
@endif