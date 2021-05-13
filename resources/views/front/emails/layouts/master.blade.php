<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="Intagono interactive" name="author"/>
		<link type="text/plain" rel="author" href="humans.txt" />
		<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
		@yield('style_sheets')
	</head>
	<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" yahoo="fix" style="font-family: 'Lato', sans-serif, Helvetica;">
		<table width="800" style="background-color: {{config('themes.emails.body.bgBody')}}; color: {{config('themes.emails.body.baseColor')}}">
            <tr>
                <td align="center">
                    &nbsp;
                </td>
            </tr>

            <tr>
                <td align="center">
                    <img src="{{ asset('front/img/emails/logo.png') }}" />
                </td>
            </tr>

			@yield('body')

			<tr>
				<td>
					<table width="700" align="center" bgcolor="{{config('themes.emails.body.bgBody')}}">
						<tr>
							<td style="text-align: right;">
								<p class="copy" style="color: {{config('themes.emails.body.copyColor')}}">
                                    {{ trans('emails.sign.copy')}}
								</p>
							</td>
						</tr>
					</table>
				</td>
			</tr>


		</table>
	</body>
</html>