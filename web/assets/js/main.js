requirejs.config({
    baseUrl: '/assets/js',
    paths: {
      jquery: [
        '//code.jquery.com/jquery-1.11.0.min',
        '../vendor/jquery/dist/jquery.min'
      ],
      bootstrap: [
        '//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min',
        '../vendor/bootstrap/dist/js/bootstrap.min'
      ],
      holderjs: '../vendor/holderjs/holder',
      flexslider: '../vendor/flexslider/jquery.flexslider-min'
    },
    shim: {
        bootstrap: {
            deps: ['jquery']
        },
        flexslider: {
            deps: ['jquery']
        }
    }
});

require(['app/homepage']);