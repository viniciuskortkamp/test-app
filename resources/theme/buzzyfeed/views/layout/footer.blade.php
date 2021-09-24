<span class="back-to-top hide-mobile"><i class="material-icons">&#xE316;</i></span>

<div class="clear"></div>
<footer class="footer-bottom category-dropdown_sec sec_cat3 clearfix clearfix">
    <div class="container">
        <img class="footer-site-logo" src="{{ asset('assets/images/flogo.png') }}" width="60px" alt="">

        <div class="footer-left">
            <div class="footer-menu clearfix">
                {{ menu('footer-menu', array(
                    'a_class' => 'footer-menu__item'
                )) }}
            </div>
            <div class="footer-copyright clearfix">
                {{ trans("updates.copyright") }}
            </div>
        </div>

        @if(config('languages.language')!=null)
        <div class="language-links hor">
            <a class="button button-white" href="javascript:">
                <i class="material-icons">&#xE8E2;</i> <b>{{ config('languages.language.'.$DB_USER_LANG)['name']  }}</b>
            </a>
            <ul class="sub-nav ">
                @foreach(config('languages.language') as $key => $lang)
                <li>
                    <a href="{{ url('/selectlanguge/'.$key) }}" class="sub-item">{{ $lang['name'] }}</a>
                </li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</footer>
