<div class="row">
    <div class="col-sm-12  col-md-8 col-lg-6">
        <div class="panel panel-primary">
            <div class="panel-heading" style="display: flex; align-items:center;">
                {{ trans('admin.MailSettings') }}
                <a href="https://support.akbilisim.com/docs/buzzy/mail-configuration" target="_blank"
                    style="margin-left:auto;color:#fff!important;" class="btn btn-sm btn-success"><i
                        class="fa fa-eye"></i> @lang('v4.see_here_more_info')</a><br>
                <a href="/admin/test-mail-config" data-toggle="tooltip"
                    data-original-title="{{trans('v4.send_test_email_info', ['email' => auth()->user()->email])}}"
                    style="color:#fff!important;" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i>
                    @lang('v4.send_test_email')</a><br>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="control-label"> MAIL DRIVER</label>
                    <div class="controls">
                        <input type="text" class="form-control input-lg" placeholder="smtp" name="MAIL_DRIVER"
                            value="{{  env('MAIL_DRIVER') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label"> MAIL HOST</label>
                    <div class="controls">
                        <input type="text" class="form-control input-lg" placeholder="smtp.gmail.com" name="MAIL_HOST"
                            value="{{  env('MAIL_HOST') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label"> MAIL PORT</label>
                    <div class="controls">
                        <input type="text" class="form-control input-lg" placeholder="587" name="MAIL_PORT"
                            value="{{  env('MAIL_PORT') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label"> MAIL USERNAME</label>
                    <div class="controls">
                        <input type="text" class="form-control input-lg" name="MAIL_USERNAME"
                            value="{{   auth()->user()->email == 'demo@admin.com' ?  "-YOU DON'T HAVE PERMISSION TO SEE THAT-" : env('MAIL_USERNAME')  }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label"> MAIL PASSWORD</label>
                    <div class="controls">
                        <input type="text" class="form-control input-lg" name="MAIL_PASSWORD"
                            value="{{  auth()->user()->email == 'demo@admin.com' ?  "-YOU DON'T HAVE PERMISSION TO SEE THAT-" : env('MAIL_PASSWORD')   }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label"> MAIL ENCRYPTION</label>
                    <div class="controls">
                        <input type="text" class="form-control input-lg" placeholder="tls" name="MAIL_ENCRYPTION"
                            value="{{  env('MAIL_ENCRYPTION') }}">
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.col -->
</div><!-- /.row -->
