#!/bin/bash

echo "Server"
sudo screen -S tw-server -d -m ./server.sh &
echo "time"
sudo screen -S tw-time -d -m ./time.sh &
echo "climate"
sudo screen -S tw-climate -d -m ./climate.sh &
