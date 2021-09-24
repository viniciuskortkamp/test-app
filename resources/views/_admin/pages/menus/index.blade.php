@extends("_admin.adminapp")
@section('header')
<link rel="stylesheet" href="{{ asset('assets/admin/css/menu.css') }}">
@endsection
@section("content")
        <!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        {{ trans('v4.menus') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> {{ trans('admin.dashboard') }}</a></li>
        <li class="active">{{ trans('v4.menus') }}</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="create-btn col-md-12">
            <button
                v-on:click="showAddMenuForm"
                class="btn btn-success mat-raised-button"
                data-toggle="modal"
                data-target="#addMenuModal"><i class="material-icons">adds</i> Add Menu</button>
          </div>

        <div class="col-md-6">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('v4.menus') }} ({{ count($menus) }})</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody><tr>
                            <th style="width: 10px">#</th>
                            <th>{{ trans('v4.menu') }}</th>
                            <th style="width: 100px">{{ trans('admin.actions') }}</th>
                        </tr>
                        @foreach($menus as  $menu)
                        <tr>
                            <td>{{ $menu->id }}.</td>
                            <td> <a href="{{ url('/admin/menus/'.$menu->id) }}" >{{ $menu->name }}</a></td>
                            <td>
                                <a href="{{ url('/admin/menus/'.$menu->id) }}" class="btn btn-sm btn-success" role="button" data-toggle="tooltip" data-original-title="{{ trans('admin.edit') }}"><i class="fa fa-edit"></i></a>
                                <a class="btn btn-sm btn-danger permanently" href="{{ action('Admin\MenuController@destroy', [$menu->id]) }}" role="button" data-toggle="tooltip" data-original-title="{{ trans('admin.delete') }}"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody></table>
                </div><!-- /.box-body -->
            </div>
        </div><!-- /.col -->
    </div><!-- /.row -->
    @include('_admin.pages.menus.particles.menu-modals', [])
</section>
@endsection
@section("footer")

@endsection
