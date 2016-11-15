import json
import zmq

context = zmq.Context()
socket = context.socket(zmq.REP)
socket.bind("tcp://127.0.0.1:5000")

json_ = {}

while True:
	msg = socket.recv()
	print msg
	message = msg.split('/')
        if message[0] == "t":
		print message
		socket.send("ok")
	elif message[0] == "i": 
		try:
			json_ = message[1]
			print 'Eingang:'
			print json_
			print 'bestehende JSON-Konfiguration ueberschrieben:'
			print json.dumps(json_)
		except IndexError:
    			print 'bestehende JSON-Konfiguration ausgegeben:'
			print json_
			print json.dumps(json_)
			print str(json_)
		socket.send(json.dumps(json_).decode('string-escape'))
	else:
		socket.send('error')
