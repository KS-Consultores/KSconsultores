var editor = CKEDITOR.replace( 'contenido' );
CKFinder.setupCKEditor( editor, '/ckfinder/ckfinder/' );
    
function CKupdate(){
    for ( instance in CKEDITOR.instances )
        CKEDITOR.instances[instance].updateElement();
}    
