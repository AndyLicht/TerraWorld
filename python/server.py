import json
import zmq
import os

context = zmq.Context()
socket = context.socket(zmq.REP)
socket.bind("tcp://127.0.0.1:5000")

json_ = json.loads('{}')


while True:
	msg = socket.recv()
	print "Eingang:"
	print msg
	message = msg.split('/')
        if message[0] == "t":
		socket.send("ok")
	elif message[0] == "s":
		try:
			json_[message[1]]["geraete"][message[2]]["status"] = json.loads(message[3])
			command = 'sispmctl -d %s %s %s' % (json.dumps(json_[message[1]]["geraete"][message[2]]["device"]).decode('string-escape'),message[4], json.dumps(json_[message[1]]["geraete"][message[2]]["number"]).decode('string-escape'))
			command = command.replace('\"','')
			os.system(command)
			socket.send('OK')
		except:
			socket.send('Schaltungserror')
	elif message[0] == "i":
		try:
			json_ = json.loads( message[1])
		except IndexError:
		socket.send(json.dumps(json_).decode('string-escape'))
	elif message[0] == "c":
		print json_.get('sensoren');
	else:
		socket.send('error')
