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


    // AJAX Load More bttn
    $(document).on('click', '.ilLoadMore', function (e) {
        e.preventDefault() //prevent default action
        
        const category = $(this).data('category')
        let postCategory = 'all'

        if (category) {
          postCategory = category
          if (!window.countPosts) {
            window.countPosts = 6
          }
        }else{
          if (!window.countPosts) {
            window.countPosts = 4
          }
        }

        $.ajax({
          type: 'GET',
          url: '/wp-admin/admin-ajax.php',
          data: {
            countPosts: window.countPosts,
            postCategory,
            action: 'blog_load_more',
          },
        }).done(function (resp) {
          if (category) {
            window.countPosts += 6
          }else{   
            window.countPosts += 4           
          }
         
          $('.il_archive_more').html(resp)
        })
      })

      // let w_width = $(window).width();

      // // $(window).resize(function() {
      // //   w_width = $(window).width(); // New width
      // //  if( w_width < 1199.5){
      // //   $(document).on('click', '.il_blog_sidebar-category-heading', function (e) {
      // //     $('.il_blog_sidebar .wp-block-categories-list').toggle(300);
      // //     $('.il_blog_sidebar-category-heading').toggleClass('active-list');
      // //   })
      // //  }
      // // });


      // if( w_width < 1199.5){
        $(document).on('click', '.il_blog_sidebar-category-heading', function (e) {
          $('.il_blog_sidebar .wp-block-categories-list').toggle(300);
          $('.il_blog_sidebar-category-heading').toggleClass('active-list');
        })
      //  }
      

});
