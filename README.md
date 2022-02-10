# RPiController
## Control Relays connected to a RaspberryPi through a Browser

### Demo:  [YouTube Video - Controlling multiple relays with Raspberry Pi through the browser](https://www.youtube.com/watch?v=Sh_ZcMt3kDU)  

Connect your Raspberry Pi GPIO pins to Relay Modules, host these files in your Raspberry Pi's webserver, and you can control the Relays from your smartphone/computer's browser.  
Optionally, forward your RPi's webserver port to your Public IP and control the Relay from anywhere in the world. IoT Project done???  
Check the [pinAssign.txt](https://github.com/rthennan/RPiController/blob/main/pinAssign.txt) file for more details about the pin <-> button mapping / Naming convention I have used for the buttons.

## Tools Used:
- Hardware Used:
  - Raspberry Pi 1/2/3/4 (Raspbian would do for the OS)
    While zero might work, I don't recommend using a wireless connected server for any serious work
  - 5V Relay Modules. While this project can handle up to an 8 channel relay (or even more if you tweak it), the actual amount depends on your requirement.
  - While I don't recommend it, you could power up small electronic devices or even transistors directly from the GPIO pins.
  - Network connection to the RPi.
  - One or more client devices (Smart Phone, Laptop, etc.) with a modern browser.  
- Software Tools Used:
  - Apache 
  - PHP (PHP 5 >= 5.5.0, PHP 7, PHP 8)    
## Credentials:
### Default credentials:  
**username/Email:** admin  
**Password:** strongpassword  

### Security:
Credentials can be reset by running the pwordReset.sh file, from the site's root directory. Ensure this script has a permission of 700 or lesser.  
Demonstration the password reset script:[YouTube Video - Running the password reset script for my Raspberry Pi relay controller](https://www.youtube.com/watch?v=dDFM9cjjSOY)  
The credentials are hashed (one-way encryption) using PHP's [password_hash](https://www.php.net/manual/en/function.password-hash.php).  
The hashed credentials are then stored to the tmpdir/creds.txt file (Relative path).  
At login attempt, the entered credentials are matched with the hash values in the above file, using [password_verify](https://www.php.net/manual/en/function.password-verify.php).  While a one-way hash is hard to decrypt, it isn't exactly unbreakable.  
So I highly recommend restricting directory listing/access to the tmpdir/creds.txt file, by making the required changes to your web server's virtual host file or htaccess file.  
I hadn't bothered using a database for storing the credentials as the project was designed with just one user in mind. But a DB store is worth considering if you intend to allow multiple users.  

## Purpose of the files:  
- index.php - Landing page + session check. Redirects to ctrl.php on successful login.
- ctrl.php: Allows controlling 8 relays. Check the [pinAssign.txt](https://github.com/rthennan/RPiController/blob/main/pinAssign.txt) file for more details about the pin <-> button mapping / Naming convention I have used for the buttons.
  - One of them (Relay1 / Pin 8) dedicated to the 'Main Machine', with a few predefined actions.
    - Power : Turns the Relay on for 1 second - The equivalent of pressing a computer's power button.
    - Reboot : Turns the Relay on for 10 seconds, turns it off for one second and then turns it on for one more second. The equivalent of a hard reboot.
    - ShutDown : Turns the Relay on for 10 seconds and then truns it off. 
  - Relay Direct Control : Provides two buttons per Relay. One for turning the corresponding GPIO pin On and one for turing it off.  
- logincheck.php - Redirects the user to the login page if the session is invalid or non-existent.
- png and css files used for styling
- pwordReset.sh - PHP script to allow resetting password from within the Raspberry Pi. Check the [security](https://github.com/rthennan/RPiController/edit/main/README.md#security) section for more details.
- trip10.sh - Mapped to the 'RINGER' button in ctrl.php. Flips all the eight pins, five times in quick intervals. Can be used as a quick check. **DO NOT USE / COMPLETELY DISABLE/REMOVE if you actually have a computing device connected to one of the GPIO pins.**
