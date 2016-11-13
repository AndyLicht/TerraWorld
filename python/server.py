import json
import zmq

context = zmq.Context()
socket = context.socket(zmq.REP)
socket.bind("tcp://127.0.0.1:5000")

jsonV = "[]"
#json = json.loads("[]")
while True:
	msg = socket.recv()
	print msg
	message = msg.split('/')
        if message[0] == "t":
		print message
		print json.dumps(jsonV);
		socket.send("ok")
	elif message[0] == "i": 
		try:
			jsonV = message[1]
			print 'bestehende JSON-Konfiguration ueberschrieben:'
			#print json.dumps(jsonV)
			print jsonV
		except IndexError:
    			print 'bestehende JSON-Konfiguration ausgegeben:'
			print jsonV
			#print json .dumps(jsonV)
		#socket.send(json.dumps(jsonV))
		socket.send(jsonV)
	else:
		socket.send('error')
