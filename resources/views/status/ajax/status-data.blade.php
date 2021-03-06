@foreach($statuses as $status)

    <article class="media status-media">
        <div class="pull-left">
            @include('status.partials.avatar-with-profile-link')
        </div>

        <div class="media-body status-media-body">
            <h4 class="media-heading status-media-heading">{{ $status->user->username }}</h4>
            <p><small class="status-media-time">{{ $status->present()->timeSincePublished() }}</small></p>
            {{ $status->body }}
        </div>

        @include('status.partials.likes')
    </article>

    @include('status.partials.comment-form')

    @include('status.partials.show-comments')

@endforeach