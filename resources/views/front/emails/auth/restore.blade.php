@extends('front.emails.layouts.base')
@section('content')
<tr>
	<td>
		<table width="680" align="center" bgcolor="{{config('themes.emails.content.bgContainerColor')}}" style="margin-top:40px;">
            <tr>
                <td align="center">
                    &nbsp;
                </td>
            </tr>
            <tr>
				<td align="center">
					<h1 style="margin-top:25px;">Reestablecer contraseña</h1>
				</td>
			</tr>
            <tr>
                <td align="center">
                    <h3 style="padding:20px 0px;">Hemos recibido una solicitud de cambiar la contraseña de su cuenta.</h3>
                </td>
            </tr>
			<tr>
				<td align="center">
					<p style="padding:0px 80px;">
                        Si está de acuerdo con la petición, usted podrá reestablecer su contraseña dando click en el siguiente link
					</p>
				</td>
			</tr>

            <tr>
                <td align="center">
                    &nbsp;
                </td>
            </tr>

            <tr>
                <td align="center">
                    &nbsp;
                </td>
            </tr>

			<tr>
				<td>
					<table align="center" width="645">
						<tr>
							<td align="center">
								<a href='{{url("/login/$reminder->user_id/$reminder->code/reset")}}' class="btn-mail">Reestablecer Contraseña</a>
							</td>
						</tr>
					</table>
				</td>
			</tr>
            <tr>
                <td align="center">
                    &nbsp;
                </td>
            </tr>

			<tr>
				<td align="center">
					<p style="margin-top:25px;">Saludos.</p>
				</td>
			</tr>

			<tr>
				<td align="center">
                    <p style="margin-bottom:25px;margin-top:10px;">El Equipo <label style="color: {{config('themes.emails.content.teamColor')}}">{{ trans('emails.sign.team')}}</label></p>
				</td>
			</tr>

		</table>
	</td>
</tr>
@stop