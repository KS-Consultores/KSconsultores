@extends('front.emails.layouts.base')
@section('content')

<tr>
    <td>
        <table width="680" align="center" bgcolor="{{config('themes.emails.content.bgContainerColor')}}" style="margin-top:40px; padding: 30px 0px;">

            <tr>
                <td align="center">
                    <h1 style="margin-top:25px;">Bienvenido</h1>
                </td>
            </tr>

            <tr>
                <td align="center">
                    <h3 style="margin:25px;">
                        Tu cuenta de usuario ha sido creada correctamente.
                    </h3>
                </td>
            </tr>

            <tr>
                <td align="center">
                    <p><b>URL: </b> {{url(\Illuminate\Support\Facades\Config::get("project.prefix")."/login")}}</p>
                    <p><b>Correo Electrónico: </b>{{$email}}</p>
                    <p><b>Contraseña: </b>{{$password}}</p>
                </td>
            </tr>

            <tr>
                <td align="center">
                    &nbsp;
                </td>
            </tr>

            <tr>
                <td align="center">
                    <p>
                        El usuario ha sido creado y activado correctamente.
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
                <td align="center">
                    <p style="margin-top:25px;">¡Gracias por unirte!</p>
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