@extends('front.emails.layouts.base')
@section('content')
<tr>
    <td>
        <table width="680" align="center" bgcolor="{{config('themes.emails.content.bgContainerColor')}}" style="margin-top:40px; padding: 30px 0px;">

            <tr>
                <td align="center">
                    <h1 style="margin:10px 0px;"><label style="color: {{config('themes.emails.content.teamColor')}}">{!! trans('emails.contact.title')!!}</label></h1>
                </td>
            </tr>

            <tr>
                <td align="center">
                   <table width="75%" align="center" style="padding: 5px; border: 2px solid {{config('themes.emails.content.borderColor')}}; border-radius: 5px;">
                       <tr>
                           <td style="background-color: {{config('themes.emails.content.borderColor')}}; padding: 15px; border-radius: 4px;">
                               <h4 style="margin: 0px; padding: 0px; color: {{config('themes.emails.body.baseColor')}};">Los datos del interesado son los siguientes:</h4>
                           </td>
                       </tr>
                       <tr>
                           <td align="center">
                               &nbsp;
                           </td>
                       </tr>
                       <tr>
                           <td width="50%" style="color: {{config('themes.emails.content.teamColor')}}"><b>Nombre</b></td>
                       </tr>
                       <tr>
                           <td>{{$name}}</td>
                       </tr>
                       <tr>
                           <td align="center" colspan="2">
                               <hr>
                               &nbsp;
                           </td>
                       </tr>

                      <tr>
                           <td width="50%" style="color: {{config('themes.emails.content.teamColor')}}"><b>Correo Electrónico</b></td>
                       </tr>
                       <tr>
                           <td>{{$email}}</td>
                       </tr>
                       <tr>
                           <td align="center" colspan="2">
                               <hr>
                               &nbsp;
                           </td>
                       </tr>

                      @if($phone != "" )
                      <tr>
                           <td width="50%" style="color: {{config('themes.emails.content.teamColor')}}"><b>Teléfono</b></td>
                       </tr>
                       <tr>
                           <td>{{$phone}}</td>
                       </tr>
                       <tr>
                           <td align="center" colspan="2">
                               <hr>
                               &nbsp;
                           </td>
                       </tr>
                       @endif

                       @if($type != "" )
                      <tr>
                           <td width="50%" style="color: {{config('themes.emails.content.teamColor')}}"><b>Tipo de asesoría que necesitas</b></td>
                       </tr>
                       <tr>
                           <td>{{$type}}</td>
                       </tr>
                       <tr>
                           <td align="center" colspan="2">
                               <hr>
                               &nbsp;
                           </td>
                       </tr>
                       @endif

                       <tr>
                           <td width="50%" style="color: {{config('themes.emails.content.teamColor')}}"><b>Mensaje</b></td>
                       </tr>
                       <tr>
                           <td>{{$comments}}</td>
                       </tr>
                       <tr>
                           <td align="center" colspan="2">
                               <hr>
                               &nbsp;
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
                    &nbsp;
                </td>
            </tr>


        </table>
    </td>
</tr>
@stop