@if(Auth::user()->account_type == 'admin')
@include('backend/staff/admin/dashboard')
@else
Invalid account type
@endif