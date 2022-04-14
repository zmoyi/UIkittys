import InfiniteAjaxScroll from '@webcreate/infinite-ajax-scroll';

let el = document.querySelector('#container');
let more = document.querySelector('.no-more');
if (el) {
    if (document.querySelector('#post')){
        window.ias = new InfiniteAjaxScroll(el, {
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

            more.style.display = 'inline';
        });
    }else {
        let loaders = document.querySelector('.loaders');
    loaders.style.display = 'none'; // default behaviour
        more.style.display = 'inline';
    }



}

