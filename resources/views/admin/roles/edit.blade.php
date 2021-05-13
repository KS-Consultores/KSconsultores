@extends('admin.layout.base')

@section('view')
<h3 class="page-title">
    {{ trans('users.update_role_title') }}
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
                <form action="/{{$prefix}}/roles/update" method="post" id="myForm" class="form-horizontal">
                    <input type="hidden" name="id" value="{{ $role->id }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">{{ trans('users.name') }} <span class="required">
                            * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="name" value="{{strtoupper($role->name)}}" data-required="1" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-3" style="text-align: left;">
                                <a href="/{{$prefix}}/roles" class="btn default">{{ trans('users.cancel') }}</a>
                            </div>
                            <div class="col-md-6"></div>
                            <div class="col-md-3" style="text-align: right;">
                                <button type="submit" class="btn green">{{ trans('users.update') }}</button>
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
                minlength: 3,
                required: true
            }
        }

        var messages = {
            name: {
                required: '<?php echo trans('users.validations.required') ?>',
                minlength: jQuery.validator.format("<?php echo trans('users.validations.minlength') ?>")
            }
        }

        app.formValidate('#myForm', rules, messages);
    });
</script>
@stop