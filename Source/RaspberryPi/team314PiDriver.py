#!/usr/bin/python
# Copyright (c) 2014 Adafruit Industries
# Author: Tony DiCola

# Permission is hereby granted, free of charge, to any person obtaining a copy
# of this software and associated documentation files (the "Software"), to deal
# in the Software without restriction, including without limitation the rights
# to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
# copies of the Software, and to permit persons to whom the Software is
# furnished to do so, subject to the following conditions:

# The above copyright notice and this permission notice shall be included in all
# copies or substantial portions of the Software.

# THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
# IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
# FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
# AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
# LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
# OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
# SOFTWARE.

# Date: 2014-10-14
# Author: Justin Koehler
# Company: Team314 Senior Design Group - Western Michigan University
# Notes: This software altered from its original code.  It has been customized
#  for use in a Raspberry Pi Model B+, to export the data into an xml file.

import sys
import time
import Adafruit_DHT


deviceName = 'Justins Pi'


# Parse command line parameters.
sensor_args = { '11': Adafruit_DHT.DHT11,
                                '22': Adafruit_DHT.DHT22,
                                '2302': Adafruit_DHT.AM2302 }
if len(sys.argv) == 3 and sys.argv[1] in sensor_args:
        sensor = sensor_args[sys.argv[1]]
        pin = sys.argv[2]
else:
        print 'usage: sudo ./Adafruit_DHT.py [11|22|2302] GPIOpin#'
        print 'example: sudo ./Adafruit_DHT.py 2302 4 - Read from an AM2302 connected to GPIO #4'
        sys.exit(1)

# Try to grab a sensor reading.  Use the read_retry method which will retry up
# to 15 times to get a sensor reading (waiting 2 seconds between each retry).
humidity, temperature = Adafruit_DHT.read_retry(sensor, pin)
timeNow = time.strftime("%c")
# Note that sometimes you won't get a reading and
# the results will be null (because Linux can't
# guarantee the timing of calls to read the sensor).
# If this happens try again!
if humidity is not None and temperature is not None:
        errorCode = '0'
else:
        errorCode = '1'

temperature = (((temperature * 9) / 5 ) + 32)
tempStr = str(temperature)
humStr = str(humidity)

stringToPrint = "<?xml version='1.0' encoding='UTF-8'?>" + '\n<currentConditions>\n<deviceName>' + deviceName  + '</deviceName>\n<readingDateTime>' + timeNow + '</readingDateTime>\n<tempUnits>Fahrenheit</tempUnits>\n<form>1TH</form>\n<ports>\n\t<port number=\"1\" name=\"Port 1\">\n\t\t<condition type=\"temperature\">\n\t\t\t<currentReading>' + tempStr + '</currentReading>\n\t\t\t<highLimit>85</highLimit>\n\t\t\t<lowLimit>10</lowLimit>\n\t\t\t<alarmStatus>0</alarmStatus>\n\t\t\t<prevAlarmStatus>0</prevAlarmStatus>\n\t\t</condition>\n\t\t<condition type=\"humidity\">\n\t\t\t<currentReading>' + humStr + '</currentReading>\n\t\t\t<highLimit>85</highLimit>\n\t\t\t<lowLimit>10</lowLimit>\n\t\t\t<alarmStatus>0</alarmStatus>\n\t\t\t<prevAlarmStatus>0</prevAlarmStatus>\n\t\t</condition>\n\t</port>\n</ports>\n<errorReadingSensor>' + errorCode + '</errorReadingSensor>\n</currentConditions>'
print stringToPrint

fileObject = open('/var/www/xmlfeed.xml','w')
fileObject.write(stringToPrint)
fileObject.close()
