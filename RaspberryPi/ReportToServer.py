//this file will be a front end for all essential functions, which there are only a few
//note, I listed the extension as .py, but this could be .whatever as anything could do this, 
//  so whatever is easiest that can 1.) read temp and humidity  2.) post ajax

/* 

1.) on load 
  -read from config.dat
      -get unique guid
      -get refresh rate
  -gets current ip address of raspPI
  -gets mac id of NIC
  -checks to see if new version of software is available
  -also on load, reports that it has loaded via some flag i'm guessing.
   maybe a column for a first loop. 
  
2.) update program. i'm not sure how to go about this, but maybe
    since this program is separate from the config, it can just download
    the new version and tell the raspPI to somehow delete the old and
    start the new?  Marcel might answer this question if google can't.
    
    maybe then have a separate loop that checks for updates every 24 hours
    from start time. maybe the next step only runs for 24 hours, and this
    loop will start that loop again, checking for updates after. i'm
    not sure. at this point, we really don't have to worry about updating
    because the point is to make things work as-is.
      
3.) if no update, start loop with [refresh rate] second timer
  
  a.) gets temperature and humidity from sensors
  
  b.) gets current ip address 
  
  c.) -post ajax call over preferably https that sends:
        -guid
        -temperature
        -humidity
        -ip address of raspPI (for security)
        -mac id of NIC (for security)
        -current version of this actual program
      -and if the return code is an error, then it sends an error report to
       a different php page for errors
*/
