jQuery(document).ready(function ($) {

    // Team

    $(".il_team_member").click(function () {
        $(this).next(".member_text").slideToggle().toggleClass('t-open');
        $(".il_team_member").not(this).next(".member_text.t-open").slideToggle().removeClass('t-open');
    });
    $(".member_text .close").click(function () {
        $(this).parents('.member_text').slideToggle().removeClass('t-open');
    });

});