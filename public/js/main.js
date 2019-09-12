
$(function() {
    var controller = new ScrollMagic.Controller();
    var containerScene = new ScrollMagic.Scene({
        triggerElement: '.change',
        duration: 100,
        offset: 200,
        triggerHook: "onCenter",
        
    })
    .setClassToggle(".change","pplScrolled")
    .addTo(controller);

});
