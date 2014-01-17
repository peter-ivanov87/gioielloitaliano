#!/bin/bash
sleep $((RANDOM % 30))

BASEDIR=$(dirname $(readlink -f "$0"))
PHP=$(which php)
PIDFILE="$BASEDIR/var/cron.pid"

if [ -f "$PIDFILE" ]; then
	PID=$(cat "$PIDFILE")
	ps -p "$PID" 2>&1 >/dev/null && exit
fi

echo $$ > "$PIDFILE"
cd "$BASEDIR"
$PHP -d max_execution_time=18000 "$BASEDIR/cron.php"
rm -f "$PIDFILE"


