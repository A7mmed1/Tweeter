
$(function() {
    var controller = new ScrollMagic.Controller();
    var containerScene = new ScrollMagic.Scene({
        triggerElement: '.change',
        duration: 100,
        offset: 200,
        triggerHook: "onleave",
    })
    .setClassToggle(".change","pplScrolled")
    .addTo(controller);

});


// $(function() {
//     var image = $(document).getElementsByClassName('scroll');
//     new simpleParallax(image,{
//
//        delay: .9,
//        transition: 'cubic-bezier(1,1,1,1)',
//
// });
