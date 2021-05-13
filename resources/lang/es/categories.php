<?php

return [
	'titles' => [
        "index" => "Categorías",
        "new" => "Nueva Categoría",
        "edit" => "Editar Categoría",
        "delete" => "Eliminar Categoría"
    ],
	'fields' => [
        "name" => "Nombre",
        "description" => "Descripción",
        "image" => "Imagen",
        "active" => "Activo"
    ],
	'buttons' => [
        "register" => "Registrar",
        "update" => "Actualizar",
        "cancel" => "Cancelar",
        "yes" => "Sí",
        "no" => "No"
    ],
	'notifications' => [
        "register_successful" => "La categoría ha sido registrada correctamente.",
        "update_successful" => "La categoría ha sido actualizada correctamente.",
        "activated_successful" => "La categoría ha sido activada correctamente.",
        "deactivated_successful" => "La categoría ha sido desactivada correctamente.",
        "delete_successful" => "La categoría ha sido eliminada correctamente.",
        "already_register" => "La categoría ya ha sido registrada.",
        "no_exists" => "La categoría no existe.",
        "delete_confirmation" => "¿Estás seguro que deseas eliminar la categoría?",
        "field_name_missing" => "El campo Nombre es obligatorio.",
        "field_description_missing" => "El campo Descripción es obligatorio.",
        "field_description_too_long" => "El campo Descripción debe tener como máximo 50 caracteres.",
        "field_image_missing" => "El campo Imagen es obligatorio.",
        "invalid_extension" => "El archivo proporcionado debe ser una imagen tipo: png o jpg.",
        "invalid_size" => "El archivo proporcionado debe tener las siguientes dimensiones mínimas: 640x430.",
    ],
	'validations' => [
        "required" => "Este campo es obligatorio.",
        "email" => "El correo eletrónico no es válido.",
        "digits" => "Este campo sólo acepta dígitos.",
        "number" => "Este campo sólo acepta valores numéricos.",
        "minlength" => "La longitus mínima de este campo es {0}.",
        "maxlength" => "La longitus máxima de este campo es {0}."
    ]
];
