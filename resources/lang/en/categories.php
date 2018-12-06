<?php

return [
	'titles' => [
        "index" => "Categories",
        "new" => "New Category",
        "edit" => "Edit Category",
        "delete" => "Delete Category"
    ],
	'fields' => [
        "name" => "Name",
        "description" => "Description",
        "image" => "Image",
        "active" => "Active"
    ],
	'buttons' => [
        "register" => "Register",
        "update" => "Update",
        "cancel" => "Cancel",
        "yes" => "Yes",
        "no" => "No"
    ],
	'notifications' => [
        "register_successful" => "The category has been successfully registered.",
        "update_successful" => "The category has been successfully updated.",
        "activated_successful" => "The category has been successfully activated.",
        "deactivated_successful" => "The category has been successfully deactivated.",
        "delete_successful" => "The category has been successfully deleted.",
        "already_register" => "The category had been registered previously.",
        "no_exists" => "The category does not exist.",
        "delete_confirmation" => "Are you sure, that you will delete selected category?",
        "field_name_missing" => "The field name is required.",
        "field_description_missing" => "The field description is required.",
        "field_image_missing" => "The field image is required."
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
