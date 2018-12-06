<?php

return [
	'titles' => [
        "index" => "Posts",
        "new" => "New Post",
        "edit" => "Edit Post",
        "delete" => "Delete Post"
    ],
	'fields' => [
        "title" => "Title",
        "description" => "Description",
        "body" => "Body",
        "outstanding" => "Outstanding",
        "image" => "Image"
    ],
	'buttons' => [
        "register" => "Register",
        "update" => "Update",
        "cancel" => "Cancel",
        "yes" => "Yes",
        "no" => "No"
    ],
	'notifications' => [
        "register_successful" => "The post has been successfully registered.",
        "update_successful" => "The post has been successfully updated.",
        "activated_successful" => "The post has been successfully activated.",
        "deactivated_successful" => "The post has been successfully deactivated.",
        "delete_successful" => "The post has been successfully deleted.",
        "already_register" => "The post had been registered previously.",
        "no_exists" => "The post does not exist.",
        "delete_confirmation" => "Are you sure, that you will delete selected post?",
        "field_title_missing" => "The field title is required.",
        "field_description_missing" => "The field description is required.",
        "field_body_missing" => "The field body is required.",
        "field_date_missing" => "The field date of post is required."
    ],
	'validations' => [
        "required" => "This field is required.",
        "email" => "This field is an invalid email.",
        "digits" => "This field only accepts digits.",
        "number" => "This field only accepts numeric values.",
        "minlength" => "the minimum length of the field is {0}.",
        "maxlength" => "the maximum length of the field is {0}."
    ]
];
