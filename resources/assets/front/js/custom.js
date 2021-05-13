$(document).ready( function(){

    $(document).foundation();

    $(".cover-hidden").remove();

    if( $(".rrssb-buttons").length > 0){
        $('.rrssb-buttons').rrssb();
    }

    $(".Header-mobile-show").on("click", function(){
        $(".Header-mobile-menu").slideToggle('ease-in');
    });

    if( $(".carousel-recent-articles").length > 0){

        var owl = $('.carousel-recent-articles');

        owl.owlCarousel({
            autoPlay: 3000, 
            itemsCustom : [
                [0, 1],
                [640, 2],
                [1024, 3],
            ],
            navigation: false, 
            pagination: false
        }); 

        $('.carousel-back').click(function() {
            owl.trigger('owl.prev');
        });

        $('.carousel-next').click(function() {
            owl.trigger('owl.next');
        });
    }

   if($(window).width() <= 768){
        $(".animated").css({ opacity:1 });
    }
    
    $(window).resize(function(){

        if($(window).width() > 768 ){
            $(".Header-mobile-menu").hide();
        }

        if( $(window).width() <= 768){
            $(".animated").css({ opacity:1 });
        }
    });


    $(window).scroll(function(event){

        var st = $(this).scrollTop();
        var alturaVentana = $(this).height() * 0.7;

        if(st > 100){
            $(".Header").addClass("fixed animated slideInDown").css({opacity:1});
        }else{
            $(".Header").removeClass("fixed animated slideInDown").css({opacity:1});
        }

        if( $(window).width() > 768){
            //Animaciones
        }
    });

    $('a[href*="#"]:not([href="#"])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');

           var topHeight = 58;

           if( $(".Header").hasClass("fixed")){
                topHeight = 58;
           }else{
                if( $(window).width() > 992){
                    topHeight = 58;
                }else{
                    topHeight = 0;
                }
           }

            if (target.length) {
                $('html, body').animate({
                  scrollTop: target.offset().top - topHeight
                }, 1000);
                return false;
            }
        }
    });

    $(".more-post").on( "click", function(){
        loadMore();
    });

    $("#categories").on( "change", function(){
        $("#form-search").submit();
    });
     

    $("#contact-form .btn-border").on("click", function(event){

        var form = $("#contact-form");
    
        form.find(".block-button").hide();
        form.find(".loading").show();

        $('.retro').html('').removeClass("error");

        if( validateContact() ){

            var type = ''; 

            if( $("#service").length > 0 ){
                type = $("#service option:selected").val();
            }
            else{
                type = $("#type").val();
            }

            var postdata = {
                _token : $(".token").val(),
                name : $("#name").val(),
                email : $("#email").val(),
                phone : $("#phone").val(),
                team : $("#team").val(),
                comments : $("#comments").val(),
                type : type
            };

            $.ajax({
                url: '/send-contact',
                type: 'POST',
                data: postdata,
                success: function(result){

                    var json = JSON.parse(result);

                    if(json.status == 'error'){
                        form.find('.retro').addClass("error").html(json.message);
                        form.find(".block-button").show();
                        form.find(".loading").hide();

                    }else{
                        form.find(".block-button").show();
                        form.find(".loading").hide();
                        form.find('.retro').html(json.message);
                        clearForm();
                    }

                },
                error: function (xhr, ajaxOptions, thrownError){
                    form.find(".block-button").show();
                    form.find(".loading").hide();
                    form.find('.retro').addClass("error").html('Error al intenter el envío.');
                }
            });

        }else{
            form.find(".block-button").show();
            form.find(".loading").hide();
        }
    }); 

    jQuery.validator.addMethod("nospacesonly", function(value, element) {
        return this.optional(element) || valida(value);
    }, "Debe contener información");  

});

function loadMore(){

    var page = parseInt( $(".page").val() );

    // Campos de busqueda
    var cat = $("#categories").val();
    var search = $("#q").val();

    page = page+1;

    var data = { q: search, categories: cat, page: page };

    $(".loading").show();
    $(".more-post").hide();

    $.ajax({
        method: "GET",
        url: "/resultados-ajax",
        data: data,
        success:function(result) {

            setTimeout(function(){
                $(".loading").hide();
                $(".page").val(page);

                var selectorList = $(".list-post");

                selectorList.append(result.posts);

                if(! result.hasMorePages){
                    $(".more-post").hide();
                }else{
                    $(".more-post").show();
                }

            }, 2000);

        }
    });
}

function validateContact(){

    var form = $("#contact-form");
    var selector = form;

    selector.validate({
        rules : {
            name : {
                required: true,
                nospacesonly: true
            },
            email : {
                required: true,
                email: true
            },
            comments : {
                required: true,
                nospacesonly: true
            }
        },
        messages : {
            name: {
                required : "Ingrese su nombre",
                nospacesonly : "Ingrese información válida"
            },
            email: {
                required : "Email es requerido",
                email : "El correo no parece válido"
            },
            comments : {
                required : "Ingrese un mensaje",
                nospacesonly : "Ingrese información válida"
            }
        }
    });

    return form.valid();
}

function clearForm(){
    $("input[type=text]").val('');
    $("textarea").val('');
}

//busca caracteres que no sean espacio en blanco en una cadena
function vacio(q) {
    for ( i = 0; i < q.length; i++ ) {
        if ( q.charAt(i) != " " ) {
                return true
        }
    }
    return false
}
 
//valida que el campo no este vacio y no tenga solo espacios en blanco
function valida(text) {
       
    if( vacio(text) == false ) {
        return false;
    } else {
        return true;
    }
}