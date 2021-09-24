@if(isset($show_categories) && $show_categories)
    <div class="item_category">
        @php($postatpe=\App\Categories::byType($post->type)->first())
        @php($postacatpe=getfirstcat($post->categories))
        {!! isset($post->categories)  && isset($postacatpe) ? '<a href="'. action('PagesController@showCategory', ['catname' => $postacatpe->name_slug ]).'" class="seca"> '.$postacatpe->name. '</a>' : '' !!}
        {!! isset($postatpe) && isset($postacatpe) && $postatpe->id !== $postacatpe->id ? '<a href="'.action('PagesController@showCategory', ['catname' => $postatpe->name_slug ]) .'" style="margin-right:5px"> '.$postatpe->name. '</a>' : '' !!}
    </div>
@endif
