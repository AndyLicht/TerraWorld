from random import randint
#neue json Version c:\Python27\python.exe c:\Entwicklungen\xampp\htdocs\terraworld\python\jsonmanipulatetest.py:
sensoren = {
	"time":
	{
		"stunde":"0",
		"minute":"0",
		"sekunde":"0"
	},
	"sensoren":[
	{
		"sensor_unten_links":
		{
			"channel": "1",
			"temp":"10",
			"luftfeuchtigkeit":"50",
			"stunde":"stunde",
			"minute":"minute",
			"sekunde":"sekunde"
		}
	},{
		"sensor_unten_rechts":
		{
			"channel": "2",
			"temp": "20",
			"luftfeuchtigkeit":"20",
			"stunde":"stunde",
			"minute":"minute",
			"sekunde":"sekunde"
		}
	},{
		"sensor_oben_links":
		{
			"channel":"3",
			"temp": "30",
			"luftfeuchtigkeit":"30",
			"stunde":"stunde",
			"minute":"minute",
			"sekunde":"sekunde"
		}
	},{
		"sensor_oben_rechts":
		{
			"channel":"4",
			"temp":"40",
			"luftfeuchtigkeit":"40",
			"stunde":"stunde",
			"minute":"minute",
			"sekunde":"sekunde"
		}
	}],
	"geraete":[
	{
		"pin":"7",
		"status":"false",
		"bezeichnung":"tageslichtlampen",
		"schaltung":[
		{
			"id":"1",
			"on":"8/30/0",
			"off":"12/0/0"
		},{
			"id":"2",
			"on":"15/0/0",
			"off":"18/0/0"
		}]
	},{
		"pin":"8",
		"status":"false",
		"bezeichnung":"beregnungsanlage",
		"schaltung":[
		{
			"id":"3",
			"on":"9/0/0",
			"off":"9/0/30"
		},{
			"id":"4",
			"on":"11/0/0",
			"off":"11/0/30"
		},{
			"id":"5",
			"on":"19/0/0",
			"off":"19/0/30"
		}]
	},{
		"pin":"9",
		"status":"false",
		"bezeichnung":"heizkabel_unten",
		"schaltung":[
		{
			"id":"6",
			"on":"0/0/0",
			"off":"0/0/0"
		}]
	},{
		"pin":"10",
		"status":"false",
		"bezeichnung":"heizkabel_oben",
		"schaltung":[
		{
			"id":"7",
			"on":"0/0/0",
			"off":"0/0/0"
		}]
	},{
		"pin":"11",
		"status":"false",
		"bezeichnung":"heizlampe_oben_links",
		"schaltung":[
		{
			"id":"8",
			"on":"11/0/0",
			"off":"17/0/0"
		}]
	},{
		"pin":"23",
		"status":"false",
		"bezeichnung":"heizlampe_oben_rechts",
		"schaltung":[
		{
			"id":"9",
			"on":"10/0/0",
			"off":"19/0/0"
		}]
	},{
		"pin":"24",
		"status":"false",
		"bezeichnung":"heizlampe_unten_links",
		"schaltung":[
		{
			"id":"10",
			"on":"11/0/0",
			"off":"17/0/0"
		}]
	},{
		"pin":"25",
		"status":"false",
		"bezeichnung":"heizlampe_unten_rechts",
		"schaltung":[
		{
			"id":"11",
			"on":"10/0/0",
			"off":"19/0/0"
		}]
	}]
}


def setSensor(message):
        for item in sensoren["sensoren"]:
                if item["channel"] == message[1]:
                        item["temp"] = message[2]
                        item["luftfeuchtigkeit"] = message[3]
                        item["stunde"] = sensoren["time"]["stunde"]
                        item["minute"] = sensoren["time"]["minute"]
                        item["sekunde"] = sensoren["time"]["sekunde"]
        socket.send('ok')

def sendInformation():
        socket.send(json.dumps(sensoren))

def setTime(message):
        sensoren['time']['stunde'] = message[1]
        sensoren['time']['minute'] = message[2]
        sensoren['time']['sekunde'] = message[3]
        time = message[1]+"/"+message[2]+"/"+message[3]
        for item in sensoren["geraete"]:
                for items in item["schaltung"]:
                        time = message[1]+"/"+message[2]+"/"+message[3]
                        if items["on"] == time:
                                setChannelOn(item)
                        if items["off"] == time:
                                setChannelOff(item)
        socket.send('ok')

def setChannel(message):
        for item in sensoren["geraete"]:
                if item["pin"] == message[1]:
                        if message[2] == "true":
                                setChannelOn(item)
                        else:
                                setChannelOff(item)
        socket.send("ok")
		

def setChannelOn(item):
        item["status"] = "true"
        GPIO.output(int(item["pin"]),True)

def setChannelOff(item):
        item["status"] = "false"
        GPIO.output(int(item["pin"]),False)
		
def deleteTime(schaltungsid):
	for item in sensoren["geraete"]:
		index = 0
		for subitem in item["schaltung"]:			
			if subitem["id"] == schaltungsid:
				print item["schaltung"]
				item["schaltung"].pop(index)
				print item["schaltung"]
			else:
				index = index + 1

def addTime(geraet,on_message,off_message):
	idliste = list()
	for item in sensoren["geraete"]:
		for subitem in item["schaltung"]:
			idliste.append(int(subitem["id"]))
	help = True 
	while ( help == True):
		newid =  randint(0,200)
		for item in idliste:
			if item == newid:
				help_ = True
				break
			else:
				help_ = False
		help = help_
	for item in sensoren["geraete"]:
		if item["bezeichnung"] == geraet:
			item["schaltung"].append({'on': on_message,'off': off_message,'id': newid,})

def manipulateTime(schaltungsid,on_message,off_message):
	for item in sensoren["geraete"]:
		for subitem in item["schaltung"]:
			print schaltungsid
			if subitem["id"] == schaltungsid:
				subitem["on"] = on_message
				subitem["off"] = off_message
				
deleteTime('3')
print ""
print ""
print sensoren




