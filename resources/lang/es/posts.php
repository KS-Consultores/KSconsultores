<?php

return [
	'titles' => [
        "index" => "Publicaciones",
        "new" => "Nueva Publicación",
        "edit" => "Editar Publicación",
        "delete" => "Eliminar Publicación"
    ],
	'fields' => [
        "title" => "Título",
        "description" => "Descripción",
        "body" => "Cuerpo",
        "outstanding" => "Destacada",
        "image" => "Imagen",
        "categories" => "Categorías",
        "likes" => "Me Gusta",
        "created_at" => "Creado",
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
        "register_successful" => "La publicación ha sido registrada correctamente.",
        "update_successful" => "La publicación ha sido actualizada correctamente.",
        "activated_successful" => "La publicación ha sido activada correctamente.",
        "deactivated_successful" => "La publicación ha sido desactivada correctamente.",
        "delete_successful" => "La publicación ha sido eliminada correctamente.",
        "already_register" => "La publicación ya ha sido registrada.",
        "no_exists" => "La publicación no existe.",
        "delete_confirmation" => "¿Estás seguro que deseas eliminar la publicación?",
        "field_title_missing" => "El campo Título es obligatorio.",
        "field_description_missing" => "El campo Descripción es obligatorio.",
        "field_body_missing" => "El campo Cuerpo es obligatorio.",
        "invalid_extension" => "El archivo proporcionado debe ser una imagen tipo: png o jpg.",
        "invalid_size" => "El archivo proporcionado debe tener las siguientes dimensiones mínimas: 780x520.",
        "field_categories_missing" => "Seleccione al menos una categoría.",
        "field_image_missing" => "El campo Imagen es obligatorio.",
        "field_date_missing" => "El campo Fecha de publicación es obligatorio."
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
