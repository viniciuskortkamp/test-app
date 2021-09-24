<div class="row">

    <div class="col-sm-12 col-md-8 col-lg-6">

        <div class="panel panel-info">
            <div class="panel-heading">Use Google reCaptcha on login, register, contact form</div>
            <div class="panel-body form-horizontal">

                <div class="form-group">
                    <label for="facebookappsecret" class="col-sm-2 control-label">App ID</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-lg" name="reCaptchaKey"
                            value="{{  get_buzzy_config('reCaptchaKey') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="facebookappsecret" class="col-sm-2 control-label">App SECRET</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-lg" name="reCaptchaSecret"
                            value="{{ auth()->user()->email == 'demo@admin.com' ? trans("admin.youPERMISSION") : get_buzzy_config('reCaptchaSecret')  }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="facebookapp" class="col-sm-2 control-label">{!! trans("v3.Usecaptchaonlogin")
                        !!}</label>
                    <div class="col-sm-10">
                        {!! Form::select('BuzzyLoginCaptcha', ['on' => trans("admin.yes"), 'off' => trans("admin.no")],
                        get_buzzy_config('BuzzyLoginCaptcha'), ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label for="facebookapp" class="col-sm-2 control-label">{!! trans("v3.Usecaptchaonregister")
                        !!}</label>
                    <div class="col-sm-10">
                        {!! Form::select('BuzzyRegisterCaptcha', ['on' => trans("admin.yes"), 'off' =>
                        trans("admin.no")], get_buzzy_config('BuzzyRegisterCaptcha'), ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label for="facebookapp" class="col-sm-2 control-label">{!! trans("admin.Usecaptchaoncontactform")
                        !!}</label>
                    <div class="col-sm-10">
                        {!! Form::select('BuzzyContactCaptcha', ['on' => trans("admin.yes"), 'off' =>
                        trans("admin.no")], get_buzzy_config('BuzzyContactCaptcha'), ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>

    </div><!-- /.col -->
</div><!-- /.row -->
