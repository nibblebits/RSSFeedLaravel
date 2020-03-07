@if(Auth::user()->account_type == 'admin')
@include('backend/admin/include/footer')
@else
Invalid account type
@endif