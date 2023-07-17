@if (config('services.facebook.active'))
    <a href='{{ route('social.login', 'facebook') }}' class='btn btn-primary btn-floating mx-1'><i class='fab fa-facebook-f'></i></a>
@endif

@if (config('services.discord.active'))
    <a href='{{ route('social.login', 'discord') }}' class='btn btn-primary btn-floating mx-1'><i class="fab fa-discord"></i></a>
@endif
