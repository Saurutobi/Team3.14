$( document ).ready(function() {	
	$('#linkHome').click(function() {
		removeClassActive();
		$('#btnHome').addClass('active');
	});

	$('#linkRooms').click(function() {
		removeClassActive();
		$('#btnRooms').addClass('active');
	});

	$('#linkDevices').click(function() {
		removeClassActive();
		$('#btnDevices').addClass('active');
	});

	$('#linkAdmin').click(function() {
		removeClassActive();
		$('#btnAdmin').addClass('active');
	});

	$("#linkLogin").click(function() {
		removeClassActive();
		$('#btnLogin').addClass('active');
	});

	function removeClassActive() {
		$('#btnHome').removeClass('active');
		$('#btnRooms').removeClass('active');
		$('#btnDevices').removeClass('active');
		$('#btnAdmin').removeClass('active');
		$('#btnLogin').removeClass('active');
		
	};
});