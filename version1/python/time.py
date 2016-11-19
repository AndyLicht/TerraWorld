import zmq
import datetime

context = zmq.Context()
socket = context.socket(zmq.REQ)
socket.connect("tcp://127.0.0.1:5000")
second_old = 0
while True:
        t = datetime.datetime.now()
        if second_old != t.second:
                second_old = t.second
                message = "t/"+str(t.hour)+"/"+str(t.minute)+"/"+str(t.second)
                socket.send(message)
                msg_in = socket.recv()