<div class="row">
    <div class="col-sm-12  col-md-8 col-lg-6">
        <div class="panel panel-primary">
            <div class="panel-heading">{{ trans('admin.OptionalConfigurations') }}</div>
            <div class="panel-body">
                <div class="form-group">
                    <label>
                        {{ trans('admin.SitePostsUrlType') }}
                    </label>
                    {!! Form::select('siteposturl', [
                    '1' => 'yoursite.com/{category}/{slug} (Default)',
                    '2' => 'yoursite.com/{category}/{id}',
                    '3' => 'yoursite.com/{username}/{slug}',
                    '4' => 'yoursite.com/{username}/{id}',
                    '5' => 'yoursite.com/{category}/{slug}-{id}'
                    ], get_buzzy_config('siteposturl'), ['class' => 'form-control']) !!}

                </div>
                <span class="help-block">{{ trans('admin.SitePostsUrlTypehelp') }}</span>
                <hr>
                <div class="form-group">
                    <label>
                        {{ trans('admin.Usersregistration') }}
                    </label>
                    {!! Form::select('sitevoting', [
                    '0' => trans('admin.yes'),
                    '1' => trans('admin.no')
                    ], get_buzzy_config('sitevoting'), ['class' => 'form-control']) !!}

                </div>
                <span class="help-block">{{ trans('admin.Usersregistrationhelp') }}</span>
                <hr>
                <div class="form-group">
                    <label class="control-label">{{ trans('admin.Auto-listedonHomepage') }}</label>
                    {!! Form::select('AutoInHomepage', ['yes' => trans('admin.on'), 'no' => trans('admin.off')],
                    get_buzzy_config('AutoInHomepage'), ['class' => 'form-control']) !!}
                </div>
                <hr>
                <div class="form-group">
                    <label class="control-label">{{ trans('admin.AutoApprovePosts') }}</label>
                    {!! Form::select('AutoApprove', ['yes' => trans('admin.on'),'no' => trans('admin.off')],
                    get_buzzy_config('AutoApprove'), ['class' => 'form-control']) !!}
                    <span class="help-block">{{ trans('admin.AutoApprovePostshelp') }}</span>
                </div>
                <div class="form-group">
                    <label class="control-label">{{ trans('admin.Auto-approveeditedposts') }}</label>
                    {!! Form::select('AutoEdited', ['yes' =>trans('admin.on'),'no' => trans('admin.off')],
                    get_buzzy_config('AutoEdited'), ['class' => 'form-control']) !!}

                    <span class="help-block">{{ trans('admin.Auto-approveeditedpostshelp') }}</span>
                </div>
                <div class="form-group">
                    <label class="control-label">{{ trans('admin.Auto-LoadonLists') }}</label>
                    {!! Form::select('AutoLoadLists', ['yes' => trans('admin.yes'),'no' => trans('admin.nouseload')],
                    get_buzzy_config('AutoLoadLists'), ['class' => 'form-control']) !!}
                    <span class="help-block">{{ trans('admin.Auto-LoadonListshelp') }}</span>
                </div>
                <hr>
                <div class="form-group">
                    <label class="control-label">{{ trans('v3half.reactionvotecount') }}</label>
                    <div class="controls">
                        <input type="number" class="form-control input-lg" name="showreactioniconon"
                            value="{{  get_buzzy_config('showreactioniconon') }}">
                    </div>
                    <span class="help-block">{{ trans('v3half.reactionvotehelp') }}</span>
                </div>
                <hr>
                <h3>{{ trans('admin.UserPermissions') }}</h3>
                <div class="form-group">
                    <label>
                        {{ trans('admin.Userscanpost') }}
                    </label>
                    {!! Form::select('UserCanPost', ['yes' => trans('admin.yes'),'no' => trans('admin.no')],
                    get_buzzy_config('UserCanPost'), ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <label>
                        {{ trans('admin.Userscandeleteownposts') }}
                    </label>
                    {!! Form::select('UserDeletePosts', ['yes' => trans('admin.yes'),'no' => trans('admin.no')],
                    get_buzzy_config('UserDeletePosts'), ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <label>
                        {{ trans('admin.Userscaneditownposts') }}
                    </label>
                    {!! Form::select('UserEditPosts', ['yes' => trans('admin.yes'),'no' => trans('admin.no')],
                    get_buzzy_config('UserEditPosts'), ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <label>
                        {{ trans('admin.Userscaneditownusernames') }}
                    </label>
                    {!! Form::select('UserEditUsername', ['yes' => trans('admin.yes'),'no' => trans('admin.no')],
                    get_buzzy_config('UserEditUsername'), ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <label>
                        {{ trans('admin.Userscaneditownemails') }}
                    </label>
                    {!! Form::select('UserEditEmail', ['yes' => trans('admin.yes'),'no' => trans('admin.no')],
                    get_buzzy_config('UserEditEmail'), ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <label>
                        {{ trans('admin.Userscanaddownsocialmediaaddresses') }}
                    </label>
                    {!! Form::select('UserAddSocial', ['yes' => trans('admin.yes'),'no' => trans('admin.no')],
                    get_buzzy_config('UserAddSocial'), ['class' => 'form-control']) !!}
                </div>
                <hr>
                <div class="form-group">
                    <h3>
                        {{ trans('admin.UseRight-to-LeftLanguageSupport') }}
                    </h3>
                    {!! Form::select('languagetype', ['rtl' => trans('admin.yes'), '' => trans('admin.no')],
                    get_buzzy_config('languagetype'), ['class' => 'form-control']) !!}

                </div>

            </div>
        </div>
    </div><!-- /.col -->

</div><!-- /.row -->
