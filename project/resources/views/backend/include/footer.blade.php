@if(Auth::user()->account_type == 'admin')
@include('backend/staff/admin/include/footer')
@else
Invalid account type
@endif