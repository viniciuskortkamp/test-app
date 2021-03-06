<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="{{ makepreview(Auth::user()->icon, 's', 'members/avatar') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p>{{  Auth::user()->username }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('admin.Online') }}</a>
        </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
        <li class="header">{{ trans('admin.MAINNAVIGATION') }}</li>
        <li @if(Request::segment(2)=='' ) class="active" @endif>
            <a href="{{  action('Admin\DashboardController@index') }}">
                <i class="fa fa-dashboard"></i> <span>{{ trans('admin.dashboard') }}</span>
            </a>
        </li>
        @if(get_buzzy_config('p_buzzycontact') == 'on')
        <li class=" @if(Request::segment(2)=='mailbox') active @endif">
            <a href="{{ action('Admin\ContactController@index') }}">
                <i class="fa fa-envelope"></i> <span>{{ trans('admin.Inbox') }}</span>
                @if($unapproveinbox >0)
                <span class="pull-right badge bg-green">{{ $unapproveinbox }}</span>
                @endif
            </a>
        </li>
        @endif
        <li @if(Request::segment(2)=='themes' ) class="active" @endif>
            <a href="{{  action('Admin\ThemesController@show') }}">
                <i class="fa fa-eye"></i> <span>{{ trans('themes.themes') }}</span>
                <span class="pull-right badge bg-red">{{ trans('admin.NEW') }}</span>

            </a>
        </li>
        <li @if(Request::segment(2)=='plugins' ) class="active" @endif>
            <a href="{{  action('Admin\PluginsController@show') }}">
                <i class="fa fa-puzzle-piece"></i> <span>{{ trans('admin.Plugins') }}</span>
            </a>
        </li>
        <li @if(Request::segment(2)=='menus' ) class="active" @endif>
            <a href="{{  action('Admin\MenuController@index') }}">
                <i class="fa fa-bars"></i> <span>{{ trans('v4.menus') }}</span>
            </a>
        </li>
        <li class="treeview  @if(Request::segment(2)=='config') active @endif">
            <a href="{{ action('Admin\ConfigController@index') }}">
                <i class="fa fa-cog"></i> <span>{{ trans('admin.Settings') }}</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li class="@if(Request::query('q')=='') active @endif"><a
                        href="{{ action('Admin\ConfigController@index') }}"><i class="fa fa-caret-right"></i>
                        {{ trans('admin.GeneralSettings') }}</a></li>
                <li class="@if(Request::query('q')=='mail') active @endif"><a
                        href="{{ action('Admin\ConfigController@index', ['q' => 'mail']) }}"><i
                            class="fa fa-caret-right"></i> {{ trans('admin.MailSettings') }}</a></li>
                <li class="@if(Request::query('q')=='login') active @endif"><a
                        href="{{ action('Admin\ConfigController@index', ['q' => 'login']) }}"><i
                            class="fa fa-caret-right"></i> {{ trans('v4.login_settings') }}</a></li>
                <li class="@if(Request::query('q')=='social') active @endif"><a
                        href="{{ action('Admin\ConfigController@index', ['q' => 'social']) }}"><i
                            class="fa fa-caret-right"></i> {{ trans('admin.SocialMediaSettings') }}</a></li>
                <li class="@if(Request::query('q')=='storage') active @endif"><a
                        href="{{ action('Admin\ConfigController@index', ['q' => 'storage']) }}"><i
                            class="fa fa-caret-right"></i> {{ trans('v3.file_storage_settings') }}</a></li>
                <li class="@if(Request::query('q')=='recaptcha') active @endif"><a
                        href="{{ action('Admin\ConfigController@index', ['q' => 'recaptcha']) }}"><i
                            class="fa fa-caret-right"></i> {{ trans('v4.recaptcha_settings') }}</a></li>
                <li class="@if(Request::query('q')=='others') active @endif"><a
                        href="{{ action('Admin\ConfigController@index', ['q' => 'others']) }}"><i
                            class="fa fa-caret-right"></i> {{ trans('admin.OtherSettings') }}</a></li>
            </ul>
        </li>
        <li @if(Request::segment(2)=='categories' ) class="active" @endif>
            <a href="{{  action('Admin\CategoriesController@index') }}">
                <i class="fa fa-folder"></i>
                <span>{{ trans('admin.Categories') }}</span>
            </a>
        </li>
        <li class=" @if(Request::segment(2)=='all' && Request::query('only')=='') active @endif">
            <a href="/admin/all/">
                <i class="fa fa-book"></i>
                <span>{{ trans('admin.LatestPosts') }}</span>
            </a>
        </li>
        <li class=" @if(Request::segment(2)=='features') active @endif">
            <a href="/admin/features/">
                <i class="fa fa-star"></i>
                <span>{{ trans('admin.FeaturesPosts') }}</span>
            </a>
        </li>
        <li class="treeview  @if(Request::segment(2)=='all' && Request::query('only')=='deleted') active @endif">
            <a href="/admin/all?only=deleted">
                <i class="fa fa-trash"></i>
                <span>{{ trans('admin.Trash', ['type' => trans('admin.Posts') ]) }}</span>
            </a>
        </li>
        <li class="treeview  @if(Request::segment(2)=='all' && Request::query('only')=='unapprove') active @endif">
            <a href="/admin/all?only=unapprove">
                <i class="fa fa-check-circle"></i>
                <span>{{ trans('admin.UnapprovedPosts') }}</span>
                <small class="label pull-right bg-aqua">{{ $toplamapprove }}</small>
            </a>
        </li>
        @foreach(\App\Categories::byMain()->byActive()->orderBy('order')->get() as $cat)
        <li class="treeview  @if(Request::segment(3)==$cat->name_slug) active @endif">
            <a href="/admin/cat/{{ $cat->name_slug }}">
                {!! $cat->icon !== null ? $cat->icon : '<i
                    class="fa fa-' . config('buzzy.post_types.' . $cat->type. '.icon') . '"></i>' !!}
                <span>{{ $cat->name }}</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li class="@if(Request::segment(3)==$cat->name_slug && Request::query('only')=='') active @endif"><a
                        href="/admin/cat/{{ $cat->name_slug }}"><i class="fa fa-eye"></i>
                        {{ trans('admin.view', ['type' => $cat->name ]) }}</a></li>
                <li class="@if(Request::query('only')=='unapprove') active @endif"><a
                        href="/admin/cat/{{ $cat->name_slug }}/?only=unapprove"><i
                            class="fa fa-check-circle"></i>{{ trans('admin.Unapproved', ['type' => $cat->name ]) }}
                        <small class="label pull-right bg-aqua">{{ $napprovenews }}</small></a></li>
                <li class="@if(Request::query('only')=='deleted') active @endif"><a
                        href="/admin/cat/{{ $cat->name_slug }}/?only=deleted"><i class="fa fa-trash-o"></i>
                        {{ trans('admin.Trash', ['type' => $cat->name ]) }}</a></li>
            </ul>
        </li>

        @endforeach

        <li class="treeview @if(Request::segment(2)=='users') active @endif">
            <a href="users">
                <i class="fa fa-users"></i>
                <span>{{ trans('admin.Users') }}</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="/admin/users"><i class="fa fa-caret-right"></i> {{ trans('admin.Users') }}</a></li>
                <li><a href="/admin/users/?only=banned"><i class="fa fa-caret-right"></i>
                        {{ trans('admin.BannedUsers') }} </a></li>
                <li><a href="/admin/users/?only=admins"><i class="fa fa-caret-right"></i>
                        {{ trans('admin.Admins') }}</a></li>
                <li><a href="/admin/users/?only=staff"><i class="fa fa-caret-right"></i> {{ trans('admin.Staff') }}</a>
                </li>
            </ul>
        </li>

        <li class="treeview  @if(Request::segment(2)=='pages') active @endif">
            <a href="#">
                <i class="fa fa-files-o"></i>
                <span>{{ trans('admin.Pages') }}</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ action('Admin\PagesController@index') }}"><i class="fa fa-caret-right"></i>
                        {{ trans('admin.ViewPages') }}</a></li>
                <li><a href="{{ action('Admin\PagesController@add') }}"><i class="fa fa-caret-right"></i>
                        {{ trans('admin.AddNewPage') }}</a></li>
            </ul>
        </li>
        <li class="treeview  @if(Request::segment(2)=='reactions') active @endif">
            <a href="{{ action('Admin\ReactionController@index') }}">
                <i class="fa fa-thumbs-o-up"></i>
                <span>Reactions</span>
            </a>
        </li>
        <li class="treeview  @if(Request::segment(2)=='widgets') active @endif">
            <a href="{{ action('Admin\WidgetsController@index') }}">
                <i class="fa fa-plus-square"></i>
                <span>{{ trans('admin.Widgets') }}</span>
            </a>
        </li>
        <li class="treeview  @if(Request::segment(2)=='tools') active @endif">
            <a href="{{ action('Admin\ToolsController@index') }}">
                <i class="fa fa-database"></i>
                <span>{{ trans('v3.tools') }}</span>
            </a>
        </li>

        <li class="treeview">
            <a href="/sitemap.xml" target="_blank">
                <i class="fa fa-rss"></i>
                <span>{{ trans('admin.Sitemap') }}</span>
            </a>
        </li>
        <li>
            <a target=_blank href="https://support.akbilisim.com/docs/buzzy/installation">
                <i class="fa fa-book"></i>
                <span> {{ trans('admin.documentation') }}</span>
            </a>
        </li>
        <li class="header">{{ trans('admin.UNAPPROVEDPOSTS') }}</li>
        @if(get_buzzy_config('p_buzzynews') == 'on')<li><a href="javascript:"><i class="fa fa-circle-o text-aqua"></i>
                <span>{{ trans('index.news') }}</span><small
                    class="label pull-right bg-aqua">{{ $napprovenews }}</small></a></li> @endif
        @if(get_buzzy_config('p_buzzylists') == 'on')<li><a href="javascript:"><i class="fa fa-circle-o text-green"></i>
                <span>{{ trans('index.list') }}</span><small
                    class="label pull-right bg-green">{{ $napprovelists }}</small></a></li> @endif
        @if(get_buzzy_config('p_buzzyquizzes') == 'on')<li><a href="javascript:"><i
                    class="fa fa-circle-o text-purple"></i> <span>{{ trans('index.quiz') }}</span><small
                    class="label pull-right bg-purple">{{ $unapprovequizzes }}</small></a></li> @endif
        @if(get_buzzy_config('p_buzzypolls') == 'on')<li><a href="javascript:"><i
                    class="fa fa-circle-o text-yellow"></i> <span>{{ trans('index.poll') }}</span><small
                    class="label pull-right bg-yellow">{{ $napprovepolls }}</small></a></li> @endif
        @if(get_buzzy_config('p_buzzyvideos') == 'on')<li><a href="javascript:"><i class="fa fa-circle-o text-red"></i>
                <span>{{ trans('index.video') }}</span><small
                    class="label pull-right bg-red">{{ $napprovevideos }}</small></a></li> @endif
    </ul>
</section>
