@extends('admin.layout.base')

@section('view')
<h3 class="page-title">
    {{ trans('users.roles_title') }}
</h3>

<div class="row">
<div class="col-md-12 col-sm-12">
<!-- BEGIN EXAMPLE TABLE PORTLET-->
<div class="portlet box blue">
<div class="portlet-title">
    <div class="caption">

    </div>
    <div class="actions">
        <div class="btn-group">
            <a class="btn btn-sm grey" href="/admin/roles/create">
                <i class="fa fa-plus"></i> {{ trans('users.new_role') }}
            </a>
        </div>
    </div>
</div>
<div class="portlet-body">
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
            <!--
                <th style="text-align: center" class="table-checkbox"><input type="checkbox" class="group-checkable" data-set="#archdioceses_table .checkboxes"/></th>
            -->
            <td style="text-align: center">Id</td>
            <td style="text-align: center">{{ trans('users.name') }}</td>
            <td style="text-align: center"></td>
        </tr>
        </thead>
        <tbody>
            @foreach($roles as $role)
                <tr class="odd gradeX">
                    <!--
                        <td style="text-align: center"><input type="checkbox" class="checkboxes" value="{{$role->id}}"/></td>
                    -->
                    <td style="text-align: center">{{str_pad($role->id,4,"0", STR_PAD_LEFT)}}</td>
                    <td style="text-align: center">{{$role->name}}</td>
                    <td style="text-align: center; width: 90px !important; padding: 5px 0 5px 5px;">
                        <a href="/{{$prefix}}/roles/{{$role->id}}/edit/" class="btn btn-sm yellow" style="width: 35px;">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a href="#" data-id="{{$role->id}}" class="btn btn-sm red deleteModal" style="width: 35px;">
                            <i class="fa fa-trash-o"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
<!-- END EXAMPLE TABLE PORTLET-->
</div>
</div>
@stop

@section('javascript_page')
<script>
    jQuery(document).ready(function($) {
        var app = new App();
        app.tableInit('.table', '<?php echo App::getLocale(); ?>');

        $(".deleteModal").on("click", function(){
            app.throwConfirmationModal('<?php echo trans('users.delete_role_title'); ?>','<?php echo trans('users.delete_role_confirmation'); ?>','/<?php echo $prefix; ?>/roles/delete', $(this).data("id"));
        });
    });
</script>
@stop