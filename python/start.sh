#!/bin/bash

echo "Server"
sudo screen -S tw-server -d -m python server.py &
echo "time"
sudo screen -S tw-time -d -m python time.py &
echo "climate"
sudo screen -S tw-climate -d -m python climate.py &
