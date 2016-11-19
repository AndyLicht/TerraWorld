sudo cp mjpg_streamer /usr/local/bin &
sudo cp output_http.so input_file.so /usr/local/lib/ &
sudo cp -R www /usr/local/www &
mkdir /tmp/stream &
screen -S raspicam -d -m raspistill --nopreview -w 640 -h 480 -q 5 -o /tmp/stream/pic.jpg -tl 100 -t 9999999 -th 0:0:0 &
LD_LIBRARY_PATH=/usr/local/lib mjpg_streamer -i "input_file.so -f /tmp/stream -n pic.jpg" -o "output_http.so -w /usr/local/www" &
