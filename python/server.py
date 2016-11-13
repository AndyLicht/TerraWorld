import json
import zmq

context = zmq.Context()
socket = context.socket(zmq.REP)
socket.bind("tcp://127.0.0.1:5000")

json = []

while True:
	msg = socket.recv()
	print msg
	message = msg.split('/')
        if message[0] == "t":
		print message
		print json
		socket.send("ok")
	elif message[0] == "i": 
		try:
			json = message[1]
		except IndexError:
    			print 'error' 
		socket.send("json")
	else:
		socket.send('error')
