Installation Instruction:

php.ini

enable mcrypt.so extension
enable mysqli.so extension

copy the work folder into root so that your adress on localhost should be 127.0.0.1/work

read, write and execute permission on /assets/tmp and /assets/work folder

/database\ structure file contains database structure and query to create tables.

dump.sql contains mysql dump.

Uses Instruction:

/application/config/database contains database related ocnfig file

/application/config/self_config contains developer related config created by hari_om

/application/library/self_library contains commonly used function created by hari_om. this is the only file which should import config and self_config file

DateTimePIcker bootstrap: 
http://www.eyecon.ro/bootstrap-datepicker/