<a href="{{ route('user.profile', $user->username) }}">
    <img class="media-object img-circle avatar" src="{{ $user->present()->gravatar(Auth::user()->email, isset($size) ? $size : 30) }}" alt="{{ $user->username }}">
</a>