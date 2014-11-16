$( document ).ready(function() {
	$('#btnAdmin').addClass('active');
	
	$(".collapsableHeader").click(function () {

		$header = $(this);

		//getting the next element
		$content = $header.next();
		
		//open up the content needed - toggle the slide- if visible, slide up, if not slidedown.
		$content.slideToggle(500, function () {

		});
	});
	
	$(".collapsableHeader").each(function () {

		$header = $(this);
		$content = $header.next();
		$content.slideToggle(0, function () {

		});
	});
});