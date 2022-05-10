#!/bin/bash

ENDPOINT="mectdb.c7xfrjfandc6.us-east-1.rds.amazonaws.com";
USER="admin";
PASS="RandomLetters";
DB="CITDB";

mysql -h $ENDPOINT -u $USER -p$PASS -D $DB -e "CREATE TABLE test1(
 id varchar(255),
username  varchar(255),
email varchar(255),
pwd varchar(255)
)";

if [[ $? -eq 0 ]]; then
    echo "MySQL connection: OK";
else
    echo "MySQL connection: Fail";
fi;
