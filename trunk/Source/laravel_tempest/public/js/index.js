$( document ).ready(function() {
    //alert('test');
	$.getJSON('nonempty_rooms', function(data){ 
		$.each(data[0], function(key,value) {
			//alert(key + ": " + value);
		});
		
		/*//need to rework query in rooms.php to below
		select max(temperature), name
		from (
		select max(t.id),t.temperature, r.name from rooms r 
		join devices d 
			on r.id = d.room_id
		join temperatures t 
			on t.device_id = d.id
		group by t.device_id) a
		group by name
		order by temperature desc */
	});
	
	
	/* google.setOnLoadCallback(drawChart); */
	$(".collapsableHeader").click(function () {

		$header = $(this);
		//alert(this.id);
		//getting the next element
		$content = $header.next();
		//open up the content needed - toggle the slide- if visible, slide up, if not slidedown.
		$content.slideToggle(500, function () {
			/* $.getJSON('all_temperature_data', function(data){ 
				drawChart(data, this.id);
			}); */
			$.getJSON('nonempty_rooms', function(data){ 
				$.each(data[0], function(key,value) {
					//alert(key + ": " + value);
				});
				
				/* var asdf = data[0][0];
				alert(asdf); */
				/* for(var key in data)
				{
					alert(key, data[0]);
				} */
			});
		});
	});
	
	$(".collapsableHeader").each(function () {

		$header = $(this);
		$content = $header.next();
		$content.slideToggle(0, function () {

		});
	});
});

function drawChart(incoming) {
	var data = new google.visualization.DataTable();
	data.addColumn('datetime', 'Time');
	data.addColumn('string', 'Device');
	
	/* data.addColumn('number', 'Temperature'); */

	var count = 0;
	
	for(var i = 0; i < incoming.length; i++)
	{
		var toSplit1 = incoming[i][0].split(':')[1];
		var devicename = toSplit1.substr(1, toSplit1.length - 6);
		
		var dataSeries = incoming[i][1];
		data.addRows(dataSeries.length);
		for(var j = 0; j < dataSeries.length; j++)
		{
			var entry = dataSeries[j];
			data.setValue(j + count,1,devicename);
			/* var dt = new Date(entry[0]);
			var dtp = new Date(dt.getFullYear() + "-" + (dt.getMonth() + 1) + "-" + (dt.getDay() + 1) + " " + dt.getHours() + ":" + dt.getMinutes());
			alert(dtp); */
			data.setValue(j/*  + count */,0,new Date(entry[0]));
			/* data.setValue(j + count,2,entry[1]); */
			/* data.setValue(j,2,entry[1]); */
			/* count++; */
		}
		
		/* seriesOptions[i] = 
		{
			name: data[i][0],
			data: data[i][1],
			derp: data[i][2]
		}; */
		
		
		//['JustinsTA', '2014-01-01 10:00', 21.6, 23]
		//['JustinsTA', '2014-01-01 10:01', 21.7, 24]
		//['JustinsTA', '2014-01-01 10:02', 21.4, 21]
		//['JustinsTA', '2014-01-01 10:03', 21.3, 23]
		//['JustinsTA', '2014-01-01 10:04', 21.7, 26]
		//['JustinsTA', '2014-01-01 10:05', 21.2, 23]
		
		
		
	}

	/* createChart('All Devices', seriesOptions); */
	/* alert('data:' + data); */
	/* data.addColumn('number', 'Humidity'); */
	
	
    /* var data = google.visualization.arrayToDataTable([
        ['Time', 'Sensor 1', 'Sensor 2'],
        ['11:01',  60.1,      60.2],
        ['11:02',  60.2,      60.5],
        ['11:03',  60.1,       60.9],
        ['11:04',  60.3,      60.6],
        ['11:05',  60.4,      61.0],
        ['11:06',  60.5,       61.2],
        ['11:07',  60.6,      61.5],
        ['11:08',  60.5,      62.2],
        ['11:09',  60.4,       62.9],
        ['11:10',  60.5,      64.1],
        ['11:11',  60.4,      64.0],
        ['11:12',  60.1,       64.1],
        ['11:13',  60.3,      63.8],
        ['11:14',  60.7,      63.7],
        ['11:15',  60.9,       63.4],
        ['11:16',  60.8,      63.2],
        ['11:17',  60.7,      62.9],
        ['11:18',  61.1,       62.7],
        ['11:19',  61.2,      62.6],
        ['11:20',  61.5,      62.5],
        ['11:21',  61.6,       62.6],
        ['11:22',  61.3,      62.4],
        ['11:23',  61.5,      62.2],
        ['11:24',  61.0,       62.4],
        ['11:25',  61.3,      62.3],
        ['11:26',  61.5,      62.6],
        ['11:27',  61.7,       62.5],
        ['11:28',  61.6,      62.6],
        ['11:29',  61.7,      62.6],
        ['11:31',  61.8,       62.5],
        ['11:32',  61.9,        62.4]
    ]); */
	


    var options = {
        title: 'Server Room A Temperature'
    };
    var options2 = {
        title: 'Server Room B Temperature'
    };
    var options3 = {
        title: 'Server Room C Temperature'
    };


    var tempChart = new google.visualization.LineChart(document.getElementById('tempChart' + roomName));
    var humChart = new google.visualization.LineChart(document.getElementById('humChart' + roomName));

    tempChart.draw(data, options);
    humChart.draw(data, options2);

};