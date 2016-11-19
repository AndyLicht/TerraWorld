import serial
import zmq

context = zmq.Context()
socket = context.socket(zmq.REQ)
socket.connect("tcp://127.0.0.1:5000")

ser = serial.Serial('/dev/ttyUSB0',115200)

while True:
        message = ser.readline()
        socket.send(message)
        msg_in = socket.recv()