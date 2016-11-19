import json


def setSensoren(message):
        msg = message.split('/')
        for item in sensoren["sensoren"]:
                if item["channel"] == message[1]:
                        item["temp"] = message[2]
                        item["luftfeuchtigkeit"] = message[3]

def getTime(message):
        msg = message.split('/')
        for item in sensoren["geraete"]:
                for items in item["schaltung"]:
                        time = message[1]+"/"+message[2]+"/"+message[3]
                        if items["on"] == "09/00/00":
                                setChannelOn(item)
                        if items["off"] == "19/00/70":
                                setChannelOff(item)
def setChannelOn(item):
        print item["pin"]
        item["status"] = "true"
def setChannelOff(item):
        print item["pin"]
        item["status"] = "false"


sensoren = {"time":{"stunde":"0","minute":"0","sekunde":"0"},"sensoren":[{"bezeichnung":"Sensor unten links","channel": "1","temp": "0","luftfeuch
tikeit":"0"},{"bezeichnung":"Sensor unten rechts","channel": "2","temp": "0","luftfeuchtikeit":"0"},{"bezeichnung":"Sensor oben links","channel":
"3","temp": "0","luftfeuchtikeit":"0"},{"bezeichnung":"Sensor oben rechts","channel": "4","temp": "0","luftfeuchtikeit":"0"}],"geraete":[{"pin":"7
","status":"false","bezeichnung":"Tageslichtlampen","schaltung":[{"on":"20/50/56","off":"21/23/12"},{"on":"20/50/56","off":"21/23/12"}]},{"pin":"8
","status":"false","bezeichnung":"Beregnungsanlage","schaltung":[{"on":"20/50/56","off":"21/23/12"}]},{"pin":"9","status":"false","bezeichnung":"H
eizkabel unten","schaltung":[{"on":"0/0/0","off":"0/0/0"}]},{"pin":"10","status":"false","bezeichnung":"Heizkabel oben","schaltung":[{"on":"0/0/0"
,"off":"0/0/0"}]},{"pin":"11","status":"false","bezeichnung":"Heizlampe oben links","schaltung":[{"on":"09/00/00","off":"19/00/00"}]},{"pin":"23",
"status":"false","bezeichnung":"Heizlampe oben rechts","schaltung":[{"on":"09/00/00","off":"19/00/00"}]},{"pin":"24","status":"false","bezeichnung
":"Heizlampe unten links","schaltung":[{"on":"09/00/00","off":"19/00/00"}]},{"pin":"25","status":"false","bezeichnung":"Heizlampe unten rechts","s
chaltung":[{"on":"08/07/00","off":"19/00/00"},{"on":"09/00/00","off":"19/00/00"}]}]}


setSensoren("s/1/34/45")

getTime("t/09/00/00")

print sensoren

