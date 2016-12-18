import zmq
from datetime import datetime,timedelta

context = zmq.Context()
socket = context.socket(zmq.REQ)
socket.connect("tcp://127.0.0.1:5000")
second_old = 0
while True:
        t = datetime.now()
	d = datetime.today() - timedelta(0)
        if second_old != t.second:
#		print d
                second_old = t.second
                message = "t/"+str(t.hour)+":"+str(t.minute)+":"+str(t.second)+"/"+str(t.day)+"."+str(t.month)+"."+str(t.year)+"/"+str(d.day)+"."+str(d.month)+"."+str(d.year)
                socket.send(message)
                msg_in = socket.recv()
