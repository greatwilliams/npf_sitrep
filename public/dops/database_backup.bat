@echo off
"C:\wamp64\bin\mysql\mysql5.7.36\bin\mysqldump.exe" -u root -p"password25" db_sfms > "C:\wamp64\www\npfmsV2\ServerDBbackup\database_backup_%date:~10,4%%date:~7,2%%date:~4,2%.sql" 