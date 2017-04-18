$('.homeLink').on('mouseover', 'a', function () {
    $('.topNav').css('background-color', 'rgba(6,6,6,1)');
}).on('mouseleave', 'a', function(){
	$('.topNav').css('background-color', 'rgba(254,254,254,1)');
});