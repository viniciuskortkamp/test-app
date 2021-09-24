<div class="row">
    <div class="col-sm-12  col-md-8 col-lg-6">
        <div class="panel panel-success">
            <div class="panel-heading">{{ trans('admin.MainConfiguration') }}</div>
            <div class="panel-body">

                <div class="form-group">
                    <label class="control-label">{{ trans('admin.SiteLanguage') }}</label>
                    <div class="controls">
                        {!! Form::select('sitedefaultlanguage', get_buzzy_language_list_options(),
                        get_buzzy_config('sitedefaultlanguage'),
                        ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">{{ trans('v4.site_timezone') }}</label>
                    <div class="controls">
                        <?php
                            $tzlist = \DateTimeZone::listIdentifiers(\DateTimeZone::ALL);
                            $timezones = [];
                            foreach($tzlist as $lang) {
                                    $timezones[$lang] = $lang;
                            }
                        ?>
                        {!! Form::select('APP_TIMEZONE', $timezones, env('APP_TIMEZONE', 'UTC'),
                        ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">{{ trans('admin.SiteName') }}</label>
                    <div class="controls">
                        <input type="text" class="form-control input-lg" name="sitename"
                            value="{{  get_buzzy_config('sitename') }}" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Site URL</label>
                    <div class="controls">
                        <input type="text" class="form-control input-lg" name="APP_URL" value="{{  url('/') }}"
                            required="required" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="sitelogo">{{ trans('admin.SiteLogo') }}</label>
                            <input type="file" id="sitelogo" name="sitelogo">
                            <p class="help-block">{{ trans('admin.SiteLogohelp') }}</p>
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <img class="field-image-preview img-thumbnail " width="150"
                            src="{{ asset('assets/images/logo.png') }}">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="footerlogo">{{ trans('admin.FooterSiteLogo') }}</label>
                            <input type="file" id="footerlogo" name="footerlogo">
                            <p class="help-block">{{ trans('admin.SiteLogohelp') }}</p>
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <img class="field-image-preview img-thumbnail" src="{{ asset('assets/images/flogo.png') }}">
                    </div>

                </div>
                <hr>
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="favicon">{{ trans('admin.SiteFavicon') }}</label>
                            <input type="file" id="favicon" name="favicon">
                            <p class="help-block">{{ trans('admin.SiteFaviconhelp') }}</p>
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <img class="field-image-preview img-thumbnail " width="40"
                            src="{{ asset('assets/images/favicon.png') }}">
                    </div>

                </div>

                <div class="form-group">
                    <label class="control-label">{{ trans('admin.SiteDefaultMetaTitle') }}</label>
                    <div class="controls">
                        <input type="text" class="form-control" name="sitetitle"
                            value="{{  get_buzzy_config('sitetitle') }}" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">{{ trans('admin.SiteDefaultMetaDescription') }}</label>
                    <div class="controls">
                        <input type="text" class="form-control" name="sitemetadesc"
                            value="{{  get_buzzy_config('sitemetadesc') }}" required="required">
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label class="control-label">{{ trans('admin.TermsofUsePageUrl') }}</label>
                    <div class="controls">
                        <input type="text" class="form-control input-lg" name="termspage"
                            value="{{  get_buzzy_config('termspage') }}">
                    </div>
                    <span class="help-block">{{ trans('admin.TermsofUsePageUrlhelp') }}</span>
                </div>
                <hr>
                <div class="form-group">
                    <label class="control-label">{{ trans('admin.Siteemail') }}</label>
                    <div class="controls">
                        <input type="text" class="form-control input-lg" name="siteemail"
                            value="{{  get_buzzy_config('siteemail') }}">
                    </div>
                </div>
                <hr>

                <div class="form-group">
                    <label class="control-label">{{ trans('admin.SiteLanguageCountryCodes') }}</label>
                    <div class="controls">
                        <input type="text" class="form-control input-lg" name="sitelanguage"
                            value="{{  get_buzzy_config('sitelanguage') }}">
                    </div>
                    <span class="help-block">{!! trans('admin.SiteLanguageCountryCodeshelp') !!}</span>
                </div>
                <hr>
                <div class="form-group">
                    <label>{{ trans('admin.Siteactive') }}</label>
                    {!! Form::select('Siteactive', ['yes' => trans('admin.yes'),'no' => trans('admin.no')],
                    get_buzzy_config('Siteactive'), ['class' => 'form-control']) !!}

                </div>
                <div class="form-group">
                    <label>{{ trans('admin.Siteactivenote') }}</label>
                    <input type="text" class="form-control input-lg" name="Siteactivenote"
                        value="{{  get_buzzy_config('Siteactivenote') }}">

                </div>
                <hr>
                <div class="form-group">
                    <label>{{ trans('v4.use_multilanguage') }}</label>
                    {!! Form::select('SiteMultilanguage', ['on' => trans('admin.yes'), '' => trans('admin.no')],
                    get_buzzy_config('SiteMultilanguage'), ['class' => 'form-control']) !!}
                    <span class="help-block">{!! trans('v4.use_multilanguage_info') !!}</span>
                </div>
            </div>
        </div>

    </div><!-- /.col -->

</div><!-- /.row -->
