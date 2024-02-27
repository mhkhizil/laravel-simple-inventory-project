@user
@if (is_null(session("auth")->email_verified_at))
<div class=" alert alert-info">
   Verify account <a href="{{route("auth.verifyUI")}}" class=" alert alert-link">Here</a>
</div>
@endif
@enduser
