$(document).foundation()

$('[data-toggle-dia]').click((ev) =>{
	const panel= $(this).data('toggleDia')
	$('#lineup-tabs').foundation('selectTab', panel)
})

var off_canvas= $('#offCanvasleft')

off_canvas.find('li').click(function (ev) {

	off_canvas.foundation('close')	
})