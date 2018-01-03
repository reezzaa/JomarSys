:: KickStarting Script
:: Created By: Bryan

@ECHO OFF
TITLE KickStart
SETLOCAL EnableDelayedExpansion

SET placedir=%~dp0
SET tempdir=%~dp0\temp

SET mariadbdir=C:\xampp\mysql\bin
SET mariadbx="%mariadbdir%\mysql.exe"
SET mariadumpx="%mariadbdir%\mysqldump.exe"
SET dbsetupdir="%~dp0\database\setup"
SET dbdumpdir="%~dp0\database\dump"
SET migratedir="%~dp0\database\migrations"

SET modeldir="%~dp0\app\Models"

SET gitdir=C:\Program Files\Git\bin
SET gitx="%gitdir%\git.exe"
IF NOT EXIST "C:\Program Files\Git\bin" (
    SET gitdir="C:\Program Files (x86)\Git\bin"
) 

SET PHPX=C:\xampp\php\php.exe

:: Start Laravel Server
IF %1==laravel (
    ECHO Starting laravel server...
    START %PHPX% artisan serve
    GOTO END
)
IF %1==lv (
    ECHO Starting laravel server...
    START %PHPX% artisan serve
    GOTO END
)

:: Start Laravel on Localhost
IF %1==localhost (
    ECHO Starting localhost server...
    START %PHPX% artisan serv --port=80
    GOTO END
)
IF %1==lh ( 
    ECHO Starting localhost server...
    START %PHPX% artisan serve --port=80
    GOTO END
)

:: Start Dumping routes
IF %1==routedump (
    ECHO Dumping %PHPX% Route List...
    %PHPX% > routelist.txt artisan route:list
    GOTO END
)
IF %1==rdump (
    ECHO Dumping %PHPX% Route List...
    %PHPX% > routelist.txt artisan route:list
    GOTO END
)

:: Status Manipulation
IF %1==down (
    ECHO Setting the server down...
    %PHPX% artisan down
    GOTO END
)
IF %1==up (
    ECHO Setting the server up...
    %PHPX% artisan up
    GOTO END
)

:: Update Component Packages
IF %1==pkg (
    IF %2==update (
        composer update
    )

    IF %2==install (
        composer require %3
    )
)

:: System Commands
IF %1==build (
    IF %2==models (
        ::ECHO "Wiping models..."
        ::DEL %modeldir%\*.php
        ECHO "Writing new models..."
        %PHPX% artisan code:models --schema=dbbarangay
        GOTO COMOK
    )

    IF %2==migrations (
        ECHO "Wiping migrations folder..."
        DEL %migratedir%\*.php
        ECHO "Writing new migrations..."
        %PHPX% artisan migrate:generate
        GOTO COMOK
    )

    IF %2==database (
        ECHO "Reloading database..."
        %mariadbx% -uroot -h127.0.0.1 --port=3306 < %dbsetupdir%\wipeinit.sql
        %mariadbx% -uroot -h127.0.0.1 --port=3306 dbBarangay < %dbdumpdir%\dbbaranggay_nightly.sql

        GOTO COMOK
    )

    IF %2==integrated (
        ECHO "Wiping migrations folder..."
        DEL %migratedir%\*.php
        ECHO "Writing new migrations..."
        %PHPX% artisan migrate:generate
        ::ECHO "Wiping models..."
        ::DEL %modeldir%\*.php
        ECHO "Writing new models..."
        %PHPX% artisan code:models --schema=dbbarangay
        GOTO COMOK
    )

    IF %2==sysback (
        ECHO "Reloading database..."
        %mariadbx% -uroot -h127.0.0.1 --port=3306 < %dbsetupdir%\wipeinit.sql
        %mariadbx% -uroot -h127.0.0.1 --port=3306 dbBarangay < %dbdumpdir%\dbbaranggay_nightly.sql

        ECHO "Wiping migrations folder..."
        DEL %migratedir%\*.php
        ECHO "Writing new migrations..."
        %PHPX% artisan migrate:generate

        ::ECHO "Wiping models..."
        ::DEL %modeldir%\*.php
        ECHO "Writing new models..."
        %PHPX% artisan code:models --schema=dbbarangay

        GOTO COMOK
    )
)

:: Database Commands
IF %1==database (
    IF %2==dump (
        ECHO "Dumping database..."
        %mariadumpx% -uroot -h127.0.0.1 --port=3306 --events --routines --triggers dbBarangay > %dbdumpdir%\dbbaranggay_nightly.sql

        GOTO COMOK
    )

    IF %2==structure (
        ECHO "Dumping database structure..."
        %mariadumpx% -uroot -h127.0.0.1 --port=3306 --no-data dbBarangay > %dbdumpdir%\dbbaranggay_struct.sql

        GOTO COMOK
    )

    IF %2==data (
        ECHO "Dumping database data..."
        %mariadumpx% -uroot -h127.0.0.1 --port=3306 --no-create-info --skip-triggers dbBarangay > %dbdumpdir%\dbbaranggay_data.sql

        GOTO COMOK
    )

    IF %2==wipe (
        ECHO "Wiping database..."
        %mariadbx% -uroot -h127.0.0.1 --port=3306 < %dbsetupdir%\wipeinit.sql

        GOTO COMOK
    )

    IF %2==rest (
        ECHO "Restoring database..."
        %mariadbx% -uroot -h127.0.0.1 --port=3306 dbBarangay < %dbdumpdir%\dbbaranggay_nightly.sql

        GOTO COMOK
    )

    IF %2==createmodelfactory (
        ECHO "Creating model factory data..."

        GOTO COMOK
    )

    IF %2==createseeds (
        ECHO "Creating database seeds..."
        

        GOTO COMOK
    )

    IF %2==executeinit (
        ECHO "Initializing database data..."
        %mariadbx% -uroot -h127.0.0.1 --port=3306 --no-data dbBarangay < %dbsetupdir%\initscript.sql

        GOTO COMOK
    )

    IF %2==executestructure (
        ECHO "Restoring database structure..."
        %mariadbx% -uroot -h127.0.0.1 --port=3306 dbBarangay < %dbdumpdir%\dbbaranggay_struct.sql

        GOTO COMOK
    )

    IF %2==executedata (
        ECHO "Restoring database data..."
        %mariadbx% -uroot -h127.0.0.1 --port=3306 dbBarangay < %dbdumpdir%\dbbaranggay_data.sql

        GOTO COMOK
    )

    IF %2==executeseed (
        ECHO "Seeding database..."
        %PHPX% artisan db:seed

        GOTO COMOK
    )

    IF %2==executefactory (
        ECHO "Executing model factory..."

        GOTO COMOK
    )
)

:NOGITCOM
ECHO INVALID COMMAND!
GOTO END

:COMOK
GOTO END

:COMERR
ECHO COMMAND NOT FOUND!
pause
exit

:END
ECHO Command Completed Successfully!
EXIT /B
