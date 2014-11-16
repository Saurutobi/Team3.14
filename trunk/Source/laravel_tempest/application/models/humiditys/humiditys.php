<?php

class Humiditys
{


/**
*	gets all data of all humiditys from the humiditys table
*
*	@param: 
*
*	@return: array of objects
*/
	public static function get_all()
	{
		try
		{
			$humiditys = DB::table('humiditys')->take(1000)->get();	//gets newest 1000 (getting all takes more memory than is allowed)
			//$humiditys = DB::table('humiditys')->get();		//gets all (bad idea!)
			return $humiditys;
		}

		catch(Exception $e)
		{
			Log::write('error', $e->getMessage());
			throw $e;
		}
	}


/**
*	gets all humiditys associated with each device and port
*
*	@param: int, int
*
*	@return: array of objects
*/
	public static function get_by_device_port($device_id, $port)
	{
		try
		{
			$humiditys = DB::table('humiditys')
			->where('device_id', '=', $device_id)
			->where('port', '=', $port)
			->get(array('time', 'humidity'));

			return  $humiditys;
		}

		catch(Exception $e)
		{
			Log::write('error', $e->getMessage());
			throw $e;
		}
	}


/**
*	inserts a record. Time updates itself automatically
*
*	@param: float, int, int
*
*	@return: boolean
*/
	public static function insert($humidity, $port, $device_id)
	{
		try
		{
			$success = DB::table('humiditys')->insert(array(
			'humidity' => $humidity,
			'port' => $port,
			'device_id' => $device_id
			));

			return $success;
		}

		catch (Exception $e)
		{
			Log::write('error', $e->getMessage());
			throw $e;
		}
	}

/**
*	gets the max humidity achieved in a week
*
*	@param: int, int
*
*	@return: array of objects
*/
	public function get_week_max($device_id, $port)
	{
		try
		{
			$max = DB::table('humiditys')
				->where('device_id', '=', $device_id)
				->where('port', '=', $port)
				->where('time', '>=', time() - (7*24*60*60))
				->max('humidity');

			return $max;
		}

		catch(Exception $e)
		{
			Log::write('error', $e->getMessage());
			throw $e;
		}
	}


/**
*	gets the min humidity achieved in a week
*
*	@param: int, int
*
*	@return: array of objects
*/
	public function get_week_min($device_id, $port)
	{
		try
		{
			return DB::table('humiditys')
				->where('device_id', '=', $device_id)
				->where('port', '=', $port)
				->where('time', '>=', time() - (7*24*60*60))
				->min('humidity');
		}

		catch(Exception $e)
		{
			Log::write('error', $e->getMessage());
			throw $e;
		}
	}


/**
*	gets the average humidity acheived in a week
*
*	@param: int, int
*
*	@return: array of objects
*/
	public function get_week_avg($device_id, $port)
	{
		try
		{
			return DB::table('humiditys')
				->where('device_id', '=', $device_id)
				->where('port', '=', $port)
				->where('time', '>=', time() - (7*24*60*60))
				->avg('humidity');
		}

		catch(Exception $e)
		{
			Log::write('error', $e->getMessage());
			throw $e;
		}
	}
}
