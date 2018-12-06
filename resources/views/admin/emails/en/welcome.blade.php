@extends('front.emails.layouts.base')
@section('content')

<tr>
    <td>
        <table width="680" align="center" bgcolor="{{config('themes.emails.content.bgContainerColor')}}" style="margin-top:40px; padding: 30px 0px;">

            <tr>
                <td align="center">
                    <h1 style="margin-top:25px;">Welcome</h1>
                </td>
            </tr>

            <tr>
                <td align="center">
                    <h3 style="margin:25px;">
                        Your account has been created successfully.
                    </h3>
                </td>
            </tr>

            <tr>
                <td align="center">
                    <p><b>URL: </b> {{url(\Illuminate\Support\Facades\Config::get("project.prefix")."/login")}}</p>
                    <p><b>Email: </b>{{$email}}</p>
                    <p><b>Password: </b>{{$password}}</p>
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
                        The user has been activated successfully.
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
                    <p style="margin-top:25px;">Thanks!</p>
                </td>
            </tr>

            <tr>
                <td align="center">
                    <p style="margin-bottom:25px;margin-top:10px;">The <label style="color: {{config('themes.emails.content.teamColor')}}">{{ trans('emails.sign.team')}}</label> team</p>
                </td>
            </tr>

        </table>
    </td>
</tr>

@stop