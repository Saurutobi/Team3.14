//  How to access GPIO registers from C-code on the Raspberry-Pi
//  Example program
//  15-January-2012
//  Dom and Gert
//
//  Updated to run correctly and dispense xml files by Justin Koehler of Team 3.14 on 04-18-2014

// Access from ARM Running Linux

#define BCM2708_PERI_BASE        0x20000000
#define GPIO_BASE                (BCM2708_PERI_BASE + 0x200000) /* GPIO controller */


#include <stdio.h>
#include <string.h>
#include <stdlib.h>
#include <dirent.h>
#include <fcntl.h>
#include <assert.h>
#include <unistd.h>
#include <sys/mman.h>
#include <sys/types.h>
#include <sys/stat.h>
#include <sys/time.h>
#include <bcm2835.h>
#include <unistd.h>
#include <time.h>

#define MAXTIMINGS 100

//#define DEBUG

#define DHT11 11
#define DHT22 22
#define AM2302 22

int readDHT(int type, int pin);

int main(int argc, char **argv)
{
	argv[1] = "11";
	argv[2] = "4" ;

  	if (!bcm2835_init())
	{
        	return 1;
	}

  	int type = 0;
	type = DHT11;
	
	int dhtpin = 4;
	int count = 1;

	int successful = 0;
	while(successful == 0)
	{
		if(readDHT(type, dhtpin) == 1)
		{
			successful = 1;
		}
		else
		{
			sleep(3);	//sleep 3 seconds then try again
			count++;	//keep track of how many fails
		}		
	}
	//printf("ran %d times\n", count);	//for debugging
	return 0;

} // main


int bits[250], data[100];
int bitidx = 0;

int readDHT(int type, int pin) 
{
  	int counter = 0;
	int laststate = HIGH;
	int j=0;

	// Set GPIO pin to output
	bcm2835_gpio_fsel(pin, BCM2835_GPIO_FSEL_OUTP);

	bcm2835_gpio_write(pin, HIGH);
	usleep(500000);  // 500 ms
	bcm2835_gpio_write(pin, LOW);
	usleep(20000);

	bcm2835_gpio_fsel(pin, BCM2835_GPIO_FSEL_INPT);

	data[0] = data[1] = data[2] = data[3] = data[4] = 0;

	// wait for pin to drop?
	while (bcm2835_gpio_lev(pin) == 1) 
	{
		usleep(1);
	}

	// read data!
	for (int i=0; i< MAXTIMINGS; i++) 
	{
		counter = 0;
		while ( bcm2835_gpio_lev(pin) == laststate) 
		{
			counter++;
			if (counter == 1000)
			{
				break;
			}
		}		
		laststate = bcm2835_gpio_lev(pin);
		if (counter == 1000) 
		{
			break;
		}
		bits[bitidx++] = counter;

		if ((i>3) && (i%2 == 0)) 
		{
			// shove each bit into the storage bytes
			data[j/8] <<= 1;
			if (counter > 200)
			{
				data[j/8] |= 1;
			}	
			j++;
    		}
  }


#ifdef DEBUG 
for (int i=3; i<bitidx; i+=2) 
{
	printf("bit %d: %d\n", i-3, bits[i]);
	printf("bit %d: %d (%d)\n", i-2, bits[i+1], bits[i+1] > 200);
}
#endif


	if ( (j >= 39) && (data[4] == ((data[0] + data[1] + data[2] + data[3]) & 0xFF)) ) 
	{
		time_t time_raw_format;
		struct tm * time_struct;

		char timeBuf [100];

		time ( &time_raw_format );
		time_struct = localtime ( &time_raw_format );
	 	strftime (timeBuf,100,"%m/%d/%Y %I:%M:%s",time_struct);

		printf("<currentConditions><deviceName>My Device</deviceName><readingDateTime>%s</readingDateTime><tempUnits>Fahrenheit</tempUnits><form>1TH</form><ports><port number=\"1\" name=\"Port 1\"><condition type=\"temperature\"><currentReading>%d</currentReading><highLimit>85</highLimit><lowLimit>10</lowLimit><alarmStatus>0</alarmStatus><prevAlarmStatus>0</prevAlarmStatus></condition><condition type=\"humidity\"><currentReading>%d</currentReading><highLimit>85</highLimit><lowLimit>10</lowLimit><alarmStatus>0</alarmStatus><prevAlarmStatus>0</prevAlarmStatus></condition></port></ports><errorReadingSensor>0</errorReadingSensor></currentConditions>\n", timeBuf, (((data[2] * 9) / 5) + 32) , data[0]);

		return 1;
	}

	return 0;
}
