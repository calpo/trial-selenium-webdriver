#!/bin/sh
cd `dirname $0`
java -jar selenium-server-standalone-2.43.1.jar > /dev/null 2>&1 &
