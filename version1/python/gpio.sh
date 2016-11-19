#!/bin/sh
#echo "4"  > /sys/class/gpio/export
echo "7"  > /sys/class/gpio/export
echo "8" > /sys/class/gpio/export
echo "9"  > /sys/class/gpio/export
echo "10"  > /sys/class/gpio/export
echo "11"  > /sys/class/gpio/export
echo "23"  > /sys/class/gpio/export
echo "24"  > /sys/class/gpio/export
echo "25"  > /sys/class/gpio/export
#echo "17"  > /sys/class/gpio/export

#echo "out" > /sys/class/gpio/gpio4/direction
echo "out" > /sys/class/gpio/gpio7/direction
echo "out" > /sys/class/gpio/gpio8/direction
echo "out" > /sys/class/gpio/gpio9/direction
echo "out" > /sys/class/gpio/gpio10/direction
echo "out" > /sys/class/gpio/gpio11/direction
echo "out" > /sys/class/gpio/gpio23/direction
echo "out" > /sys/class/gpio/gpio24/direction
echo "out" > /sys/class/gpio/gpio25/direction
#echo "in" > /sys/class/gpio/gpio17/direction


echo "0" > /sys/class/gpio/gpio7/value
echo "0" > /sys/class/gpio/gpio8/value
echo "0" > /sys/class/gpio/gpio9/value
echo "0" > /sys/class/gpio/gpio10/value
echo "0" > /sys/class/gpio/gpio11/value
echo "0" > /sys/class/gpio/gpio23/value
echo "0" > /sys/class/gpio/gpio24/value
echo "0" > /sys/class/gpio/gpio25/value

#chmod 666 /sys/class/gpio/gpio4/value
chmod 666 /sys/class/gpio/gpio7/value
chmod 666 /sys/class/gpio/gpio8/value
chmod 666 /sys/class/gpio/gpio9/value
chmod 666 /sys/class/gpio/gpio10/value
chmod 666 /sys/class/gpio/gpio11/value
chmod 666 /sys/class/gpio/gpio23/value
chmod 666 /sys/class/gpio/gpio24/value
chmod 666 /sys/class/gpio/gpio25/value
#chmod 666 /sys/class/gpio/gpio17/value
