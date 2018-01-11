'use strict';

$(function(){

    // choix de la forme via AJAX
    function selectShape(){

         switch(shape){
            case 'rectangle':
                $.get('list-items/rect.html', function(data){
                    $('.shape-option').html(data);
                 })
                break;
            case 'square':
                $.get('list-items/square.html', function(data){
                    $('.shape-option').html(data);
                 })
                break;
            case 'ellipse':
                $.get('list-items/ellipse.html', function(data){
                    $('.shape-option').html(data);
                 })
                break;
            case 'circle':
                $.get('list-items/circle.html', function(data){
                    $('.shape-option').html(data);
                 })
                break;
            case 'triangle':
                $.get('list-items/triangle.html', function(data){
                    $('.shape-option').html(data);
                 })
                break;
        }
    }

    // affecter a une variable la valeur (donc la forme) choisie
    var shape = $('.family').val();
    selectShape();

    // change dynamiquement la valeur lorsque l'utilisateur interagit avec le select du formulaire
    $('.family').change(function(){
        shape = $(this).val();
        selectShape();
    });

    // animation du splash screen
    if ($('.title').length) {
        $('.title').on('click', function(){
            $('.form').css({
                'display' : 'flex'
            });
            $('.form').slideDown();
            $('#svg').show();
            $('.title').hide();
        });
    } else {
        $('.form').slideDown();
        $('#svg').show();
        $('.title').hide();
    }

    // efface le dessin en cours
    $('#erase').on('click', function(){
        $('svg').remove();
    });
    
});