import json
import zmq
import os

context = zmq.Context()
socket = context.socket(zmq.REP)
socket.bind("tcp://127.0.0.1:5000")

json_ = json.loads('{}')
time = "12:23:14"

while True:
	msg = socket.recv()
	print "Eingang"
	print msg
	message = msg.split('/')
        if message[0] == "t":
		time = message[1]
		for tkey in json_:
			for gkey in json_[tkey]['geraete']:
				for sckey in  json_[tkey]['geraete'][gkey]['schaltung']:
					if json_[tkey]['geraete'][gkey]['schaltung'][sckey]['on'] == message[1]:
						print "schalte an"
						json_[tkey]['geraete'][gkey]['status'] = True
						command = 'sispmctl -d %s -o %s' % (json.dumps(json_[tkey]['geraete'][gkey]['device']).decode('string-escape'),json.dumps(json_[tkey]['geraete'][gkey]['number']).decode('string-escape'))
                                                command = command.replace('\"','')
                                                os.system(command)
					elif json_[tkey]['geraete'][gkey]['schaltung'][sckey]['off'] == message[1]:
						print "schalte aus"
						json_[tkey]['geraete'][gkey]['status'] = False
						command = 'sispmctl -d %s -f %s' % (json.dumps(json_[tkey]['geraete'][gkey]['device']).decode('string-escape'),json.dumps(json_[tkey]['geraete'][gkey]['number']).decode('string-escape'))
			                        command = command.replace('\"','')
                        			os.system(command)
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
			json_ = json.loads(message[1])
		except IndexError:
			print "Ausgeben"
		socket.send(json.dumps(json_).decode('string-escape'))
	elif message[0] == "c":
		for tkey in json_:
			for skey in json_[tkey]['sensoren']:
				if message[1] == json_[tkey]['sensoren'][skey]['number']:
					json_[tkey]['sensoren'][skey]['temp'] = message[2]
					json_[tkey]['sensoren'][skey]['humidity'] = message[3]
					json_[tkey]['sensoren'][skey]['time'] = time
		socket.send('Klima');
	else:
		socket.send('error')
