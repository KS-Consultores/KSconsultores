@extends('admin.layout.base')

@section('view')
<h3 class="page-title">
    {{ trans('posts.titles.index') }}
</h3>

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="actions">
                    <div class="btn-group">
                        <a class="btn btn-sm grey" href="/admin/posts/create">
                            <i class="fa fa-plus"></i> {{ trans('posts.titles.new') }} </i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <td style="text-align: center">{{ trans("posts.fields.created_at") }}</td>
                        <td style="text-align: center">{{ trans("posts.fields.title") }}</td>
                        <td style="text-align: center">{{ trans("posts.fields.description") }}</td>
                        <td style="text-align: center">{{ trans("posts.fields.categories") }}</td>
                        <td style="text-align: center">{{ trans("posts.fields.likes") }}</td>
                        <td style="text-align: center">{{ trans("posts.fields.image") }}</td>
                        <td style="text-align: center">{{ trans("posts.fields.outstanding") }}</td>
                        <td style="text-align: center">{{ trans("posts.fields.active") }}</td>
                        <td style="text-align: center"></td>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                            <tr class="odd gradeX">
                                <td style="text-align: center; vertical-align: middle;">
                                    <span class="hidden">{{Date::parse($post->date)->format('Y-m-d')}}</span>{{Date::parse($post->date)->format('d \d\e F, Y')}}</td>
                                <td style="text-align: center; vertical-align: middle;">{{$post->title}}</td>
                                <td style="text-align: center; vertical-align: middle;">{{$post->description}}</td>
                                <td style="text-align: center; vertical-align: middle;">{{$post->categories->implode('name', ', ')}}</td>
                                <td style="text-align: center; vertical-align: middle;">{{$post->likes->count()}}</td>
                                <td style="text-align: center; vertical-align: middle;">
                                    <img width="60" height="60" src="/{{ $post->path() . '/sm-' . $post->image }}">
                                </td>
                                <td style="text-align: center; vertical-align: middle; width: 50px;"><a href="{{$post->outstanding ? '/admin/posts/'.$post->id.'/nonoutstanding' : '/admin/posts/'.$post->id.'/outstanding'}}" class="btn btn-sm {{$post->outstanding ? "green" : "red"}}" style="width: 35px; margin-right: 0px;"><i class="fa {{$post->outstanding ? "fa-check" : "fa-times"}}"></i></a></td>
                                <td style="text-align: center; vertical-align: middle; width: 50px;"><a href="{{$post->active ? '/admin/posts/'.$post->id.'/deactive' : '/admin/posts/'.$post->id.'/active'}}" class="btn btn-sm {{$post->active ? "green" : "red"}}" style="width: 35px; margin-right: 0px;"><i class="fa {{$post->active ? "fa-check" : "fa-times"}}"></i></a></td>
                                <td style="text-align: center; vertical-align: middle; width: 90px !important; padding: 5px 0 5px 5px;">
                                    <a href="/admin/posts/{{$post->id}}/edit" class="btn btn-sm yellow" style="width: 35px;">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="#" data-id="{{$post->id}}" class="btn btn-sm red deleteModal" style="width: 35px;">
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

        $(".page-content").delegate(".deleteModal","click", function(){
            app.throwConfirmationModal('<?php echo trans('posts.titles.delete'); ?>','<?php echo trans('posts.notifications.delete_confirmation'); ?>','/admin/posts/delete', $(this).data("id"));
        });
    });
</script>
@stop