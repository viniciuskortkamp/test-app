<div class="message">
    <a class="message-user-icon" href="/profile/{{ $message->user->username_slug }}">
        <img src="{{ makepreview($message->user->icon, 's', 'members/avatar') }}"
            alt="{{ $message->user->username }}" class="img-circle">
    </a>
    <div class="message-body">
        <div class="message-meta">
            <div class="message-heading">{{ $message->user->username }}</div>
            <small>—</small>
            <div class="message-date">{{ $message->created_at->diffForHumans() }}</div>
        </div>
        <p>{!! nl2br($message->body) !!}</p>
    </div>
</div>
