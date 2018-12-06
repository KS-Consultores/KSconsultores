@extends('admin.layout.base')

@section('view')
<h3 class="page-title">
    {{ trans('categories.titles.index') }} 
</h3>

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="actions">
                    <div class="btn-group">
                        <a class="btn btn-sm grey" href="/admin/categories/create">
                            <i class="fa fa-plus"></i> {{ trans('categories.titles.new') }} </i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <td style="text-align: center">{{ trans("categories.fields.name") }}</td>
                        <td style="text-align: center; width: 80px;">Estatus</td>
                        <td style="text-align: center">Acciones</td>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr class="odd gradeX">
                                <td style="text-align: center; vertical-align: middle;">{{$category->name}}</td>
                                
                                <td style="text-align: center; vertical-align: middle; width: 50px;"><a href="{{$category->active ? '/admin/categories/'.$category->id.'/deactive' : '/admin/categories/'.$category->id.'/active'}}" class="btn btn-sm {{$category->active ? "green" : "red"}}" style="width: 35px; margin-right: 0px;"><i class="fa {{$category->active ? "fa-check" : "fa-times"}}"></i></a></td>
                                <td style="text-align: center; vertical-align: middle; width: 90px !important; padding: 5px 0 5px 5px;">
                                    <a href="/admin/categories/{{$category->id}}/edit" class="btn btn-sm yellow" style="width: 35px;">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="#" data-id="{{$category->id}}" class="btn btn-sm red deleteModal" style="width: 35px;">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop

@section('javascript_page')
<script>
    jQuery(document).ready(function($) {
        var app = new App();
        app.tableInit('.table', '<?php echo App::getLocale(); ?>');

        $(".deleteModal").on("click", function(){
            app.throwConfirmationModal('<?php echo trans('categories.titles.delete'); ?>','<?php echo trans('categories.notifications.delete_confirmation'); ?>','/admin/categories/delete', $(this).data("id"));
        });
    });
</script>
@stop