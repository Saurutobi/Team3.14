<?php

class HumidityDeltas
{

/**
*	gets all humidity deltas that are from today
*
*	@param:
*
*	@return: array of objects
*/
	public static function get_close_today()
	{
		try
		{
			//raw query
			$q = DB::query( "SELECT close, device_id, port FROM humidity_deltas 
					WHERE DATE(time) = DATE(NOW())  
				");

			return $q;
		}

		catch(Exception $e)
		{
			Log::write('error', $e->getMessage());
			throw $e;
		}
	}


/**
*	gets times of humidity deltas associated with a given device and port
*
*	@param: int, int
*
*	@return: array of objects
*/
	public static function get_time_by_device_port($device_id, $port)
	{
		try
		{
			$deltas = DB::table('humidity_deltas')
			->where('device_id', '=', $device_id)
			->where('port', '=', $port)
			->get(array('time')
			);

			return  $deltas;
		}

		catch(Exception $e)
		{
			Log::write('error', $e->getMessage());
			throw $e;
		}
	}


/**
*	gets all humidity deltas associated with a given device and port
*
*	@param: int, int
*
*	@return: array of objects
*/
	public static function get_humidity_data_by_device_port($device_id, $port)
	{
		try
		{
			$deltas = DB::table('humidity_deltas')
				->where('device_id', '=', $device_id)
				->where('port', '=', $port)
				->get(array('time', 'open', 'close', 'low', 'high')
			);

			return  $deltas;
		}

		catch (Exception $e)
		{
			Log::write('error', $e->getMessage());
			throw $e;
		}
	}


/**
*	gets all humidity deltas associated with a given device and port that are from today
*
*	@param: int, int
*
*	@return: array of objects
*/
	public static function get_today_by_device_port($port, $device_id)
	{
		$q = DB::query( "SELECT time, open, high, low, close, id FROM humidity_deltas 
			WHERE DATE(time) = DATE(NOW()) 
			AND device_id = '$device_id'
			AND port = '$port' 
			");

		return $q;
	}


/**
*	will create a new record if one is not found for today's date, otherwise will update that 
* 	record
*
*	@param: float, int, int
*
*	@return: boolean
*/
	public static function insert($humidity, $port, $device_id)
	{
		try
		{
			$success = false;
			//see if record already exists for today
			$q = HumidityDeltas::get_today_by_device_port($port, $device_id);

			//if does not exist-- create a new record
			if( sizeof($q) == 0 )
			{

				$success = HumidityDeltas::insert_new($humidity, $port, $device_id);
			}

			if( sizeof($q) >= 1)
			{
				$success = HumidityDeltas::update($q, $humidity);
			}

			return $success;

		}

		catch (Exception $e)
		{
			Log::write('error', $e->getMessage());
			throw $e;
		}
	}


/**
*	inserts the new record
*
*	@param: float, int, int
*
*	@return: boolean
*/
	public static function insert_new($humidity, $port, $device_id)
	{
		$success = DB::table('humidity_deltas')->insert( array(
		'open' => $humidity,
		'close' => $humidity,
		'low' => $humidity,
		'high' => $humidity,
		'time' => date("Y-m-d H:i:s"),
		'port' => $port,
		'device_id'=> $device_id
		));

		return $success;
	}


/**
*	updates today's record
*
*	@param: object, float
*
*	@return: boolean
*/
	public static function update($current_delta, $new_humidity)
	{
		$low = intval($current_delta[0]->low);
		$high = intval($current_delta[0]->high);

		if ($new_humidity < $low)
		{
			$low = $new_humidity;
		}

		if ($new_humidity > $high)
		{
			$high = $new_humidity;
		}

		$success = DB::table('humidity_deltas')->where( 'id', '=', $current_delta[0]->id)
			->update( array(
				'close' => $new_humidity,
				'low' => $low,
				'high' => $high
			));

		return $success;
	}
}