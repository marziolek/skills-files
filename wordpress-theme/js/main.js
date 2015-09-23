/*global $:false */
jQuery(document).ready(function($){
    'use strict';

    $('.nav.navbar-nav').onePageNav({
        currentClass: 'active',
        changeHash: true,
        scrollSpeed: 900,
        scrollOffset: 0,
        scrollThreshold: 0.3,
        filter: 'lang-item'
    });

    $('.side-nav-circles').onePageNav({
        currentClass: 'active',
        changeHash: true,
        scrollSpeed: 900,
        scrollOffset: 0,
        scrollThreshold: 0.3
    });

    if ($(window).width() <= 767) {
        $('#navigation').find('a').click( function() {
            $('.navbar-collapse').collapse('hide');
        });
    };

    $(document).scroll( function(val) {
        if ($(document).scrollTop() > $(window).height()/3) {
            $('.navbar.navbar-default').addClass('scrolling');
        } else {
            $('.navbar.navbar-default').removeClass('scrolling');
        }
    });

    function showContentCircle (element) {
        var currentId = $(element).parent().data('id');
        if (!$(element).hasClass('show')) {
            $(element).toggleClass('active').delay(100).queue(function(){
                $(element).toggleClass('show').dequeue();
            });
        } else {
            $(element).toggleClass('show').delay(300).queue(function(){
                $(element).toggleClass('active').dequeue();
            });
        }
    }

    $('#o-nas .child-page > div, #about-us .child-page > div').click( function() {
        var currentId = $(this).parent().data('id');
        $('#o-nas .child-page[data-id!='+currentId+'], #about-us .child-page[data-id!='+currentId+']').children().each( function() {
            if ($(this).hasClass('active show')) {
                showContentCircle($(this));
            }
        });
        showContentCircle(this);
    });

    $('#oferta .child-page-heading, #offer .child-page-heading').click ( function() {
        $(this).parent().toggleClass('extend');
        $(this).siblings().slideToggle(300);
    });

    var myScroll;
    function loaded () {
        myScroll = new IScroll('#iscroll', {
            scrollX: true,
            scrollY: false,
            momentum: false,
            snap: true,
            scrollbars: true,
            interactiveScrollbars: true,
            eventPassthrough: true
        });
    }

    $('#portfolio .child-page, #portfolio-2 .child-page').width($('#portfolio .main-content-wrapper, #portfolio-2 .main-content-wrapper').width());
    $('#portfolio .main-content, #portfolio-2 .main-content').width($('#portfolio .main-content-wrapper, #portfolio-2 .main-content-wrapper').width() * $('#portfolio .main-content, #portfolio-2 .main-content').data('children')).delay(100).queue( function() {
        loaded();
        $(this).dequeue();
    });
});

