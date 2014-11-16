<?php

class Device_Types extends PHPUnit_Framework_TestCase
{
	public function testTableExists()
	{
		try
		{
			$pdo = DB::connection('mysql')->pdo;
			$stmt = $pdo->query('describe device_types');
			$stmt->execute();
		
			if($stmt->fetch())
			{
				$this->assertTrue(true);
			}
		}

		catch(Exception $e)
		{
			$this->fail("Table not found. Did you run migrations?");
		}
	}

}