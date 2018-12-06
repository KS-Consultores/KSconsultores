<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.2
Version: 3.6.2
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title>{{Config::get('project.name')}}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta content="{{Config::get('project.description')}}" name="description"/>
    <meta content="{{Config::get('project.author')}}" name="author"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
    <link href="/metronic/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="/metronic/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="/metronic/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="/metronic/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="/metronic/assets/global/plugins/select2/select2.css" rel="stylesheet" type="text/css"/>
    <link href="/metronic/assets/admin/pages/css/login-soft.css" rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN THEME STYLES -->
    <link href="/metronic/assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
    <link href="/metronic/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="/metronic/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
    <link id="style_color" href="/metronic/assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css"/>
    <link href="/metronic/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
    <!-- END THEME STYLES -->
    <link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
<!-- BEGIN LOGO -->
<div class="logo">
    <a href="index.html">
        <img src="/metronic/assets/admin/layout/img/logo-big.png" alt=""/>
    </a>
</div>
<!-- END LOGO -->
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGIN -->
<div class="content">
<!-- BEGIN LOGIN FORM -->
<form class="login-form" action="/admin/login/reset" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="user_id" value="{{ $user->id }}">
    <input type="hidden" name="code" value="{{ $code }}">
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <button class="close" data-close="alert"></button>
            <span>
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </span>
    </div>
    @endif
    @if (isset($message) && $message == "nomatch")
    <div class="alert alert-danger">
        <button class="close" data-close="alert"></button>
        <span>Las contraseñas no coinciden.</span>
    </div>
    @endif
    <h3 class="form-title" style="color: #C00">{{ trans('login.reset.title') }}</h3>
    <div class="form-group">
        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
        <label class="control-label visible-ie8 visible-ie9">{{ trans('login.username') }}</label>
        <div class="input-icon">
            <i class="fa fa-lock"></i>
            <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="{{ trans('login.password') }}" name="password1"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">{{ trans('login.password') }}</label>
        <div class="input-icon">
            <i class="fa fa-lock"></i>
            <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="{{ trans('login.repassword') }}" name="password2"/>
        </div>
    </div>
    <div class="form-actions">
        <label class="checkbox"></label>
        <button type="submit" class="btn blue pull-right">
            {{ trans('login.save') }} <i class="m-icon-swapright m-icon-white"></i>
        </button>
    </div>
</form>
<!-- END LOGIN FORM -->

</div>
<!-- END LOGIN -->
<!-- BEGIN COPYRIGHT -->
<div class="copyright">
    {{date("Y")}} &copy; {{Config::get('project.name')}}
</div>
<!-- END COPYRIGHT -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="/metronic/assets/global/plugins/respond.min.js"></script>
<script src="/metronic/assets/global/plugins/excanvas.min.js"></script>
<![endif]-->
<script src="/metronic/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="/metronic/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="/metronic/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/metronic/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="/metronic/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="/metronic/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="/metronic/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="/metronic/assets/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
<script type="text/javascript" src="/metronic/assets/global/plugins/select2/select2.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="/metronic/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="/metronic/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="/metronic/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
    jQuery(document).ready(function() {
        Metronic.init(); // init metronic core components
        Layout.init(); // init current layout

        // init background slide images
        $.backstretch([
            "/metronic/assets/admin/pages/media/bg/1.jpg",
            "/metronic/assets/admin/pages/media/bg/2.jpg",
            "/metronic/assets/admin/pages/media/bg/3.jpg",
            "/metronic/assets/admin/pages/media/bg/4.jpg"
        ], {
                fade: 1000,
                duration: 8000
            }
        );

        var Login = function () {

            var handleLogin = function() {
                $('.login-form').validate({
                    errorElement: 'span', //default input error message container
                    errorClass: 'help-block', // default input error message class
                    focusInvalid: false, // do not focus the last invalid input
                    rules: {
                        password1: {
                            required: true
                        },
                        password2: {
                            required: true
                        }
                    },

                    messages: {
                        password1: {
                            required: '<?php echo trans('login.validations.password_required') ?>',
                        },
                        password2: {
                            required: '<?php echo trans('login.validations.password_required') ?>'
                        }
                    },

                    invalidHandler: function (event, validator) { //display error alert on form submit
                        $('.alert-danger', $('.login-form')).show();
                    },

                    highlight: function (element) { // hightlight error inputs
                        $(element)
                            .closest('.form-group').addClass('has-error'); // set error class to the control group
                    },

                    success: function (label) {
                        label.closest('.form-group').removeClass('has-error');
                        label.remove();
                    },

                    errorPlacement: function (error, element) {
                        error.insertAfter(element.closest('.input-icon'));
                    },

                    submitHandler: function (form) {
                        form.submit();
                    }
                });

                $('.login-form input').keypress(function (e) {
                    if (e.which == 13) {
                        if ($('.login-form').validate().form()) {
                            $('.login-form').submit();
                        }
                        return false;
                    }
                });
            }

            return {
                //main function to initiate the module
                init: function () {
                    handleLogin();
                }

            };

        }();

        Login.init();
        Demo.init();
    });
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>