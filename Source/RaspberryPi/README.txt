To Set Up Pi:

1.) set up web server

2.) set up driver
  a.) Install Adafruit's python Temp/Hum libraries:
    i.)   git clone https://github.com/adafruit/Adafruit_Python_DHT.git
    ii.)  cd Adafruit_Python_DHT
    iii.) sudo apt-get upgrade
    iv.)  sudo apt-get install build-essential python-dev
    v.)   sudo python setup.py install
    vi.)  now go ahead and delete the Adafruit_Python_DHT folder if you'd like.  The libraries
           are installed, and that's all we needed from that.
  
  b.) Place the team314PiDriver.py whereever you like
    
3.) set up cron jobs
  a.) crontab -e
  b.) add a line such as (1 = minute interval, change to 5 if you want every 5 minutes, etc):
    */1 * * * * sudo ~/team314PiDriver.py 2302 4
    
    
To Use Driver: 

1.) notes: 
  a.) it can be used with a DHT11, DHT22, or AM2302 sensor
  b.) you may have to enable execute permissions on the file 
    i.)   sudo chmod +x team314PiDriver.py

2.) just simply execute the py at your leisure or have a cron job run it.  By default it will 
     create the document xmlfeed.xml in /var/www/
    a.) The nice thing is as it's a python file, it doesn't need to be compiled. You can just
         change what you want, test it, and it works. 
 
 
Notes for presentation:
for error testing, the driver indicates a sensor read error. this does
nothing if the driver doesn't run, as the same xml file will just 
