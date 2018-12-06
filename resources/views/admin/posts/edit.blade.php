@extends('admin.layout.base')

@section('view')
<h3 class="page-title">
    {{ trans('posts.titles.edit') }}
</h3>

<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption"></div>
                <div class="tools"></div>
            </div>
            <div class="portlet-body form">
                <form action="/admin/posts/update" method="post" id="form_posts" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value="{{ $post->id }}">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">
                                {{ trans("posts.fields.title") }} <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="title" value="{{$post->title}}" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">
                                {{ trans("posts.fields.description") }} <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="description" value="{{$post->description}}" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">
                                {{ trans("posts.fields.body") }} <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <textarea id="body" name="body" class="form-control">
                                    {{$post->body}}
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">
                                {{ trans("posts.fields.categories") }} <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <select class="form-control select2" name="category_list[]" multiple>
                                    <option value="">&nbsp;</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $post->categories->contains($category) ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">
                                {{ trans("posts.fields.outstanding") }} 
                            </label>
                            <div class="col-md-4">
                                <input type="checkbox"{{$post->outstanding == 1 ? 'checked="checked"' : ""}} name="outstanding" class="make-switch" data-on-color="success" data-off-color="danger" data-on-text="{{ trans("posts.buttons.yes") }}" data-off-text="{{ trans("posts.buttons.no") }}" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">
                                &nbsp;
                            </label>
                            <div class="col-md-4">
                                <img src="/{{ $post->path() . '/' . $post->image }}" class="img-responsive">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">
                                {{ trans("posts.fields.image") }}
                            </label>
                            <div class="col-md-4">
                                <input type="file" name="image" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">
                                Fecha de publicación
                            </label>
                            <div class="col-md-4">
                                <div class="input-group input-medium date date-picker" data-date-format="yyyy-mm-dd">
                                    <input type="text" name="date" class="form-control" readonly="" value="{{$now}}">
                                    <span class="input-group-btn">
                                        <button class="btn default" type="button">
                                            <i class="fa fa-calendar"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-3" style="text-align: left;">
                                <a href="/admin/posts" class="btn default">{{ trans('posts.buttons.cancel') }}</a>
                            </div>
                            <div class="col-md-6"></div>
                            <div class="col-md-3" style="text-align: right;">
                                <button type="submit" class="btn green">{{ trans('posts.buttons.update') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@section('javascript_page')
<script>
    jQuery(document).ready(function($) {
        $('.select2').select2();

        tinymce.init({
            selector: "#body",
            theme: "modern",
            height: 500,
            plugins: [
                 "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                 "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                 "save table contextmenu directionality emoticons template paste textcolor youtube jbimages"
           ],
           toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | print preview fullscreen | forecolor backcolor | link youtube jbimages", 
           style_formats: [
                {title: 'Bold text', inline: 'b'},
                {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                {title: 'Example 1', inline: 'span', classes: 'example1'},
                {title: 'Example 2', inline: 'span', classes: 'example2'},
                {title: 'Table styles'},
                {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
            ]
         }); 

        var app = new App();

        var rules = {
            title: {
                required: true
            },
            description: {
                required: true
            },
            body: {
                required: true
            }
        };

        var messages = {
            title: {
                required: "<?php echo trans("posts.validations.required") ?>"
            },
            description: {
                required: "<?php echo trans("posts.validations.required") ?>"
            },
            body: {
                required: "<?php echo trans("posts.validations.required") ?>"
            }
        };

        app.formValidate('#form_posts', rules, messages);
    });
</script>
@stop