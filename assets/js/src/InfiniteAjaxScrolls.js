import InfiniteAjaxScroll from '@webcreate/infinite-ajax-scroll';

let el = document.querySelector('#container');
if (el) {
    window.ias = new InfiniteAjaxScroll('#container', {
        item: '#post',
        next: '.next',
        pagination: '.pager',
        prefill:true,
        spinner: {
            // element to show as spinner
            element: '.loaders',
            delay: 3000,

            // this function is called when the button has to be shown
            show: function(element) {
                element.style.display = 'inline'; // default behaviour
            },

            // this function is called when the button has to be hidden
            hide: function(element) {
                element.style.display = 'none'; // default behaviour
            }
        }
    });
    ias.on('last', function() {
        let el = document.querySelector('.no-more');
        el.style.display = 'inline';
    });


}







