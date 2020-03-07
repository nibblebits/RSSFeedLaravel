@include('backend/include/admin-banner')

@if(Auth::user()->account_type == 'admin')
@include('backend/admin/include/header')
@else
Invalid account type
@endif