@extends('admin.layout.base')

@section('view')
<h3 class="page-title">
    {{ trans('users.new') }}
</h3>

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN VALIDATION STATES-->
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">

                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form action="/{{$prefix}}/users/store" method="post" id="myForm    " class="form-horizontal">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">{{ trans('users.email') }} <span class="required">
                            * </span>
                            </label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                    </span>
                                    <input type="email" name="email" value="{{Input::old("email")}}" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">{{ trans('users.firstname') }} <span class="required">
                            * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="name" value="{{Input::old("name")}}" data-required="1" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">{{ trans('users.lastname') }} <span class="required">
                            * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="surname" value="{{Input::old("surname")}}" data-required="1" class="form-control"/>
                            </div>
                        </div>
                        <!--<div class="form-group">
                            <label class="control-label col-md-3">{{ trans('users.role') }} <span class="required">
                            * </span>
                            </label>
                            <div class="col-md-4">
                                <select class="form-control select2me" name="role">
                                    <option value="">{{ trans('users.select_role') }}</option>
                                    @foreach($roles as $role)
                                        <option value="{{$role->name}}" {{Input::old("role") == $role->name ? 'selected="selected' : ''}}>{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>-->
                        <br> 
                        <div class="form-group">
                            <label class="control-label col-md-7">{{ trans('users.password_tip') }}</label>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">{{ trans('users.password') }}</label>
                            <div class="col-md-4">
                                <input type="password" id="password1" name="password1" value="{{Input::old("password1")}}" data-required="1" class="form-control"/>
                            </div>  
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">{{ trans('users.password_confirm') }}</label>
                            <div class="col-md-4">
                                <input type="password" name="password2" value="{{Input::old("password2")}}" data-required="1" class="form-control"/>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="control-label col-md-3">{{ trans('users.active') }}</label>
                            <div class="col-md-4">
                                <input type="checkbox" name="activo" class="make-switch" data-on-color="success" data-off-color="danger" data-on-text="{{ trans('users.yes') }}" data-off-text="{{ trans('users.no') }}" >
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-3" style="text-align: left;">
                                <a href="/{{$prefix}}/users" class="btn default">{{ trans('users.cancel') }}</a>
                            </div>
                            <div class="col-md-6"></div>
                            <div class="col-md-3" style="text-align: right;">
                                <button type="submit" class="btn green">{{ trans('users.register') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- END FORM-->
            </div>
            <!-- END VALIDATION STATES-->
        </div>
    </div>
</div>
@stop

@section('javascript_page')
<script>
    jQuery(document).ready(function($) {
        var app = new App();

        var rules = {
            name: {
                required: true,
                minlength: 3
            },
            surname: {
                required: true,
                minlength: 3
            },
            email: {
                required: true,
                email: true
            },
            role: {
                required: true
            },
            password1: {
                minlength: 6
            },
            password2: {
                minlength: 6,
                equalTo: "#password1"
            }
        }

        var messages = {
            name: {
                required: '<?php echo trans('users.validations.required') ?>',
                minlength: jQuery.validator.format("<?php echo trans('users.validations.minlength') ?>")

            },
            surname: {
                required: '<?php echo trans('users.validations.required') ?>',
                minlength: jQuery.validator.format("<?php echo trans('users.validations.minlength') ?>")

            },
            email: {
                required: '<?php echo trans('users.validations.required') ?>',
                email: "<?php echo trans('users.validations.email') ?>"
            },
            role: {
                required: '<?php echo trans('users.validations.required') ?>'
            },
            password1: {
                minlength: jQuery.validator.format("<?php echo trans('users.validations.minlength') ?>")
            },
            password2: {
                minlength: jQuery.validator.format("<?php echo trans('users.validations.minlength') ?>"),
                equalTo: "<?php echo trans('users.validations.equalTo') ?>"
            }
        }

        app.formValidate('#myForm', rules, messages);
    });
</script>
@stop