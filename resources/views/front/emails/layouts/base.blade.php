@extends('front.emails.layouts.master')

@section('style_sheets')
	<style type="text/css">
		body{
			width: 100%;
			margin:0;
			padding:0;
			font-family: 'Lato', sans-serif;
		}

		p{
			font-size: 14px;
			max-width: 645px;
			margin-left: auto;
			margin-right: auto;
			margin-top:10px;
			margin-bottom: 10px;
		}

		h1{
			font-size: 30px;
			font-weight: lighter;
		}

		a{
			text-decoration: none;
		}

		a:hover{
			text-decoration: underline;
		}

        .copy{
            font-size: 11px;
        }

        .btn-mail{
            background-color: {{config('themes.emails.button.bgBtnColor')}};
            color: {{config('themes.emails.button.btnColor')}};
            text-align: center;
            padding: 12px;
        }

        .btn-mail a{
            color: {{config('themes.emails.button.btnColor')}};
            text-align: center;
        }

        .btn-mail:hover{
            background-color: {{config('themes.emails.button.bgBtnColorHover')}};
            color: {{config('themes.emails.button.btnColorHover')}};
            text-decoration: none;
        }

	</style>
@stop

@section('body')

	@yield('content')

	<!--footer-->

	<!--ens footer -->
@stop