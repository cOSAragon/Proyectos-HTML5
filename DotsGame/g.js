var appCache = window.applicationCache;
$(document).bind('touchmove',function(e){e.preventDefault()});
$(function(){
	$('#menu,#score,#help,#lose,#update').css('visibility','hidden');
	window.hs = 0;
	window.db = openDatabase('score','0.1','High score records',1024);
	if(!window.db) {
		alert('Unable to initialize High Score database.');
	} else {
		if(!localStorage.getItem('hs'))
			localStorage.setItem('hs',0);
		window.hs = localStorage.getItem('hs');
		$('#m_hs').text('High Score: '+window.hs);
	}
	$('#menu').css('visibility','visible');
	$('#menu').removeClass('hidden');
	appCache.addEventListener('updateready',function(e){
		if(appCache.status == appCache.UPDATEREADY){
			appCache.swapCache();
			$('#update').css('visibility','visible').removeClass('hidden');
		}
	},false);
	$('#update div,#lose div').bind('touchstart mousedown',function(){
		$(this).addClass('t');
	}).bind('touchend mouseup',function(){
		$(this).removeClass('t');
	});
});
function showHelp() {
	$('#help').css('visibility','visible');
	$('#help').removeClass('hidden');
}
function hideHelp() {
	setTimeout(function(){$('#help').css('visibility','hidden')},500);
	$('#help').addClass('hidden');
}
function newGame() {
	window.circles = 0;
	$('#game').empty();
	addCircle();
	setTimeout(function(){$('#menu,#lose').css('visibility','hidden')},500);
	$('#menu,#lose').addClass('hidden');
}
function nextLevel() {
	addCircle();
	setTimeout(function(){$('#score').css('visibility','hidden')},500);
	$('#score').addClass('hidden');
}
function toMenu() {
	window.circles = 0;
	$('#game').empty();
	$('#lose').addClass('hidden');
	setTimeout(function(){$('#lose').css('visibility','hidden')},500);
	$('#menu').css('visibility','visible').removeClass('hidden');
}
function cancelUpdate() {
	$('#update').addClass('hidden');
	setTimeout(function(){$('#update').css('visibility','hidden')},500);
}
function doUpdate() {
	$('#menu,#update').addClass('hidden');
	setTimeout(function(){window.location.reload()},500);
}
function addCircle() {
	window.circles ++;
	var c = $('<div>');
	c.addClass('c');
	var s = Math.floor(Math.random()*48)+24;
	var w = 320;
	var h = 460;
	c.css({
		width: s,
		height: s,
		top: Math.floor(Math.random()*(h-s-1)) + 'px',
		left: Math.floor(Math.random()*(w-s-1)) + 'px'
	});
	c.attr('onclick','tapCircle('+window.circles+')');
	$('#game').append(c);
}
function tapCircle(i) {
	if(i==window.circles) {
		if(window.circles > window.hs) {
			window.hs = window.circles;
			$('#s_hs').text('New High Score!');
			localStorage.setItem('hs',window.hs);
		}
		$('#curscore,#lose_score').text(window.circles);
		$('#score').css('visibility','visible');
		$('#score').removeClass('hidden');
	} else {
		$('#lose').css('visibility','visible');
		$('#lose').removeClass('hidden');
	}
}