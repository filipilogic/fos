jQuery(document).ready(function ($) {

    // Mobile navigation

    $(".menu-toggle").click(function () {
        $("#primary-menu").fadeToggle();
        $(this).toggleClass('menu-open')
    });
    // Sub Menu Trigger

    $( "#primary-menu li.menu-item-has-children > a" ).after('<span class="sub-menu-trigger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg></span>');

    $( ".sub-menu-trigger" ).click(function() {
		$( this ).parent().toggleClass('sub-menu-open')
		$( this ).siblings(".sub-menu").slideToggle();
	});



    // Technologies
/*
    $(".tg_trigger-1").click(function () {
        $(".tg_trigger-1").toggleClass('si_open');
        $(".tg_trigger.si_open:not(.tg_trigger-1)").removeClass('si_open');
        $(".tg_modal-1").slideToggle().toggleClass('si_open');
        $(".tg_modal.si_open:not(.tg_modal-1)").slideToggle().removeClass('si_open');
    });

    $(".tg_trigger-2").click(function () {
        $(".tg_trigger-2").toggleClass('si_open');
        $(".tg_trigger.si_open:not(.tg_trigger-2)").removeClass('si_open');
        $(".tg_modal-2").slideToggle().toggleClass('si_open');
        $(".tg_modal.si_open:not(.tg_modal-2)").slideToggle().removeClass('si_open');
    });

    $(".tg_trigger-3").click(function () {
        $(".tg_trigger-3").toggleClass('si_open');
        $(".tg_trigger.si_open:not(.tg_trigger-3)").removeClass('si_open');
        $(".tg_modal-3").slideToggle().toggleClass('si_open');
        $(".tg_modal.si_open:not(.tg_modal-3)").slideToggle().removeClass('si_open');
    }); */





});
