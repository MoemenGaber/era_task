class InfiniteScroll {


    constructor(){
       this.ajaxPostLoad();
    }



    ajaxPostLoad() {
        let paged = 1;
        let post_id = document.querySelector('.ajax-post').getAttribute('data-id');
        let inProgress = false;
        jQuery(window).scroll(function () {
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight && !inProgress) {
                inProgress = true; // Set the flag to true to prevent multiple requests
                jQuery.ajax({
                    type: 'GET',
                    url: infinite_scroll.ajaxurl,
                    data: {
                        action: 'load_more_posts',
                        paged: paged,
                        post_id: post_id
                    },
                    success: function (data) {
                        if (data.success) {
                            jQuery('.single-post-content').append(data.content);
                            paged = paged+1;
                            history.replaceState(null, null, data.permalink);
                            inProgress = false;
                        } else {
                            // Handle the case when there are no more posts to load
                            console.log('No more posts to load.');
                        }
                    }
                });
            }
        });
    }
}

document.addEventListener("DOMContentLoaded", () => {
 new InfiniteScroll();
});