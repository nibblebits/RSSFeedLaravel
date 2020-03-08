@if(Auth::user()->account_type == 'admin')
@include('backend/admin/dashboard')
@else
Invalid account type
@endif