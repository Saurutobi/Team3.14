If the database needs to be installed from scratch, open a mysql terminal, 
  navigate to the /db folder and run the following:

    mysql -u [username] -p[password] < createDatabase.sql


This will:

1.) create the database/schema
2.) create the empty tables, complete with triggers, indexes, and keys
3.) insert an administrator with a random username/password that upon creation will 
  trigger a delete of the temporary admin

Note: the first time the program is run the temprorary admin will be forced to
  create a username/password for a permanent admin before any further actions
  would be allowed.
