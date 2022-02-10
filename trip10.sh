#!/bin/bash
#I know this script could have been much smaller if I had used variables to loop through all the pins since we are basically performing the same actions for all the pins listed.
#But I hadn't thought of it when I had the Relay Modules with me. Since I cannot test the loop approach now, I haven't used it in this code. But feel free to do so.
gpio -1 mode 8 out
gpio -1 mode 10 out
gpio -1 mode 12 out
gpio -1 mode 16 out
gpio -1 mode 18 out
gpio -1 mode 22 out
gpio -1 mode 24 out
gpio -1 mode 26 out

i=0
while [ $i -le 4 ]
do

	gpio -1 write 8 0
	sleep 0.1
	gpio -1 write 8 1


	gpio -1 write 10 0
	sleep 0.1
	gpio -1 write 10 1


	gpio -1 write 12 0
	sleep 0.1
	gpio -1 write 12 1


	gpio -1 write 16 0
	sleep 0.1
	gpio -1 write 16 1


	gpio -1 write 18 0
	sleep 0.1
	gpio -1 write 18 1


	gpio -1 write 22 0
	sleep 0.1
	gpio -1 write 22 1


	gpio -1 write 24 0
	sleep 0.1
	gpio -1 write 24 1


	gpio -1 write 26 0
	sleep 0.1
	gpio -1 write 26 1
  ((i++))
done
