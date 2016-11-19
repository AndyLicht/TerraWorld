import time
import RPi.GPIO as GPIO

GPIO.setmode(GPIO.BOARD)
GPIO.setup(11,GPIO.IN)
x = 0 #Zustand des Pins
n = 0 #Funktionswiederholungen
time0 = 0
time1 = 0
while 1:
        if GPIO.input(11) ==GPIO.HIGH:
                #print 1
                y = 1 #Hilfsvariable
                n = n + 1
                if x != y:
                        time0 = time.time() * 1000
                        print time0 - time1,
                        x = y
#                       print n ,
                        print x
                        n = 0
        else:
                y = 0
                n = n + 1
                if x !=y:
                        time1 = time.time() * 1000
                        print time1 - time0,
                        x = y
#                       print n ,
                        print x
                        n = 0
                #print 0

