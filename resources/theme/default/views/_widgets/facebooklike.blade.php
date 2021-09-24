@php($social_links = collect(config('buzzy.social_links'))->filter(function($item, $provider){
return get_buzzy_config( $provider.'page') > '';
})->map(function($item, $provider){
return array_merge($item, [
'url' => get_buzzy_config( $provider.'page', $item['url'] ?? ''),
'follow_text' => get_buzzy_config( $provider.'page_btn_text', $item['follow_text'] ?? ''),
]);
}) )
<div style="margin-bottom:20px">
    @foreach ($social_links as $provider => $item)
    <a class="button button-white social-{{$provider}}" target=_blank href="{!!  $item['url'] !!}"
        @if(!empty($item['color']))
        style="display: flex;align-items:center;padding: 10px;margin-bottom:5px;text-align: left;color:#fff;background:{{$item['color']}}!important"
        @endif>
        <img width="26px" src="{{ $item['icon'] }}" />
        <span>{{ !empty($item['follow_text'] )? $item['follow_text'] : trans(isset($item['trans']) ? 'v4.'.$item['trans'] : 'v4.follow_us_on', ['name' =>  $item['name']]) }}</span>
    </a>
    @endforeach
</div>
