@if ($tags != "")
<div class="content-tag hide-mobiles">
    @foreach(explode(',', $tags) as $tag)
    <span class="tagy"><a
            href="{{ action('PagesController@showtag', str_replace([' ', '%20'], ['-', '-'], $tag)) }}">{{$tag}}</a></span>
    @endforeach
</div>
@endif
