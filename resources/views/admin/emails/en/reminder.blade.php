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
                    <h1 style="margin-top:25px;">Password Recovery</h1>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <h3 style="padding:20px 0px;">You or someone else sent a request to recover the password for your account.</h3>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <p style="padding:0px 80px;">
                        Follow the link to recover your password:
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
                                <a href='{{url(\Illuminate\Support\Facades\Config::get("project.prefix")."/login/$reminder->user_id/$reminder->code/reset")}}' class="btn-mail">Password Recovery</a>
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