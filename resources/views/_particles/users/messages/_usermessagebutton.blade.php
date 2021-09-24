@if(Auth::check() && Auth::user()->id !== $userinfo->id)
    <a class="button button-white button-small" href="{{ action('UserMessageController@create', [Auth::user()->username_slug]) }}?to={{$userinfo->username_slug}}" rel="nofollow">
        <i class="material-icons" style="margin-right:5px;">send</i> {{ trans('v4.send_message') }}
    </a>
@endif
