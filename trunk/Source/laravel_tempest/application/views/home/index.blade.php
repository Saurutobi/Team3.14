@layout('layouts.default')

@section('title')
<title>Environment Management</title>
@endsection


@section('include')
	<script src="{{ URL::to_asset("js/index.js") }}"></script>	
	<script src="{{ URL::to_asset("js/home.js") }}"></script>
	


@endsection


@section('content')
	<div class="roomSection">
		@foreach($rooms as $room)
			<?php 
				$roomDeviceCount = 0;
				foreach($devices as $device)
				{
					if($room->id == $device->room_id)
					{
						++$roomDeviceCount;
					}
				}				
			?>
			@if($roomDeviceCount > 0)
			<div class="row">
				<div class="col-md-12 collapsableContainer">
					<div class="panel-heading collapsableHeader" id="{{$room->name}}"><span>{{$room->name}}</span></div>
					<div class="collapsableContent">						
						<!-- devices -->
						
						<div class="col-md-4">
							<div class="panel panel-success">
								<ul class="list-group">
									@foreach($devices as $device)
										@if($room->id == $device->room_id)
											@if ($device->status === "OK")
												<li class="list-group-item list-group-item-success">
											@elseif ($device->status === "WARNING")
												<li class="list-group-item list-group-item-warning">
											@else
												<li class="list-group-item list-group-item-danger">
											@endif
													<div class="liSpan">
														<span class="leftSpan">{{$device->name}}</span>
														@foreach($tempDeltas as $delta)
															@if($device->id == $delta->device_id)
																<span><?php echo round($delta->close, 1) ?>°F</span>
															@endif
														@endforeach
														@foreach($humDeltas as $delta)
															@if($device->id == $delta->device_id)
																<span><?php echo round($delta->close, 1) ?>%</span>
															@endif
														@endforeach
														@if ($device-> status === "C_N_C")
															<span class="label label-danger">Offline</span>
														@else
															<span class="label label-success">Online</span>
														@endif
													</div>
												</li>
										@endif
									@endforeach
								</ul>
							</div>
						</div>
					
						<!-- charts -->
						
						<div class="col-md-8">
							<div id="tempChart{{$room->name}}" style="width:auto; height:100%;"></div>
							<div id="humChart{{$room->name}}" style="width:auto; height: 100%;"></div>
						</div>
					</div>
				</div>
			</div>
			@endif
		@endforeach
	</div>
@endsection


@section('glance')

	
@endsection
