KS command list:

ks lv / ks laravel              -   starts system on laravel server
ks lh / ks localhost            -   starts system on localhost server
ks rdump / ks routedump         -   dumps routelist to root directory
ks down                         -   sets system down (maintenance mode)
ks up                           -   sets system up

ks build migrations             -   wipes and writes new migrations (not yet implemented)
ks build models                 -   wipes and writes new models
ks build database               -   wipes database and restores database from nightly dump
ks build sysback                -   wipes and builds system backend (database, model)

ks database dump                -   dumps the whole database as nightly dump
ks database structure           -   dumps the database structure only (no data)
ks database data                -   dumps the database data only (no structure)
ks database wipe                -   wipes the whole database
ks database rest                -   restores database from nightly dump without wiping
