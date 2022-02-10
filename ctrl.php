<?php
    require ("logincheck.php");
    $URI = $_SERVER['REQUEST_URI'];
    //$ipaddress = getenv("REMOTE_ADDR"); 
    $ipaddress = $_SERVER["HTTP_CF_CONNECTING_IP"];
    if(!empty($_POST)){
		//magic
		header("location:$URI");
	}

    if (isset($_POST['pwr']))
    {	system("gpio -1 mode 8 out");
        system("gpio -1 write 8 0");
		sleep(1);
		system("gpio -1 write 8 1");
		$fp = fopen('/home/pi/gpioPass/ctrlLogs.log', 'a');//opens file in append mode
		fwrite($fp,date('Y-m-d H:i:s', time()));
		fwrite($fp,"\t remote IP => \t");
		fwrite($fp,$ipaddress);
        fwrite($fp,"\t Power button pressed. \n");
		fclose($fp);
    }
    else if (isset($_POST['frc']))
    {
		system("gpio -1 mode 8 out");
		system("gpio -1 write 8 0");
		sleep(10);
		system("gpio -1 write 8 1");
		sleep(1);
		system("gpio -1 write 8 0");
		sleep(1);
		system("gpio -1 write 8 1");	
		
		$fp = fopen('/home/pi/gpioPass/ctrlLogs.log', 'a');//opens file in append mode
		fwrite($fp,date('Y-m-d H:i:s', time()));
			fwrite($fp,"\t remote IP => \t");
			fwrite($fp,$ipaddress);
		fwrite($fp,"\t Force Reboot attempted. \n");
		fclose($fp);
    }
    else if (isset($_POST['sdown']))
    {
		system("gpio -1 mode 8 out");
		system("gpio -1 write 8 0");
		sleep(10);
		system("gpio -1 write 8 1");	
		
		$fp = fopen('/home/pi/gpioPass/ctrlLogs.log', 'a');//opens file in append mode
		fwrite($fp,date('Y-m-d H:i:s', time()));
			fwrite($fp,"\t remote IP => \t");
			fwrite($fp,$ipaddress);
		fwrite($fp,"\t Force Shutdown attempted. \n");
		fclose($fp);
    }	
    else if (isset($_POST['rly1On']))
    {
		system("gpio -1 mode 8 out");
		system("gpio -1 write 8 0");
	}
    else if (isset($_POST['rly1Off']))
    {
		system("gpio -1 mode 8 out");
		system("gpio -1 write 8 1");
    }	
    else if (isset($_POST['rly2On']))
    {
		system("gpio -1 mode 10 out");
		system("gpio -1 write 10 0");
	}
    else if (isset($_POST['rly2Off']))
    {
		system("gpio -1 mode 10 out");
		system("gpio -1 write 10 1");
    }	
    else if (isset($_POST['rly3On']))
    {
		system("gpio -1 mode 12 out");
		system("gpio -1 write 12 0");
	}
    else if (isset($_POST['rly3Off']))
    {
		system("gpio -1 mode 12 out");
		system("gpio -1 write 12 1");
    }		
    else if (isset($_POST['rly4On']))
    {
		system("gpio -1 mode 16 out");
		system("gpio -1 write 16 0");
	}
    else if (isset($_POST['rly4Off']))
    {
		system("gpio -1 mode 16 out");
		system("gpio -1 write 16 1");
    }		
    else if (isset($_POST['rly5On']))
    {
		system("gpio -1 mode 18 out");
		system("gpio -1 write 18 0");
	}
    else if (isset($_POST['rly5Off']))
    {
		system("gpio -1 mode 18 out");
		system("gpio -1 write 18 1");
    }	
    else if (isset($_POST['rly6On']))
    {
		system("gpio -1 mode 22 out");
		system("gpio -1 write 22 0");
	}
    else if (isset($_POST['rly6Off']))
    {
		system("gpio -1 mode 22 out");
		system("gpio -1 write 22 1");
    }		
    else if (isset($_POST['rly7On']))
    {
		system("gpio -1 mode 24 out");
		system("gpio -1 write 24 0");
	}
    else if (isset($_POST['rly7Off']))
    {
		system("gpio -1 mode 24 out");
		system("gpio -1 write 24 1");
    }	
    else if (isset($_POST['rly8On']))
    {
		system("gpio -1 mode 26 out");
		system("gpio -1 write 26 0");
	}
    else if (isset($_POST['rly8Off']))
    {
		system("gpio -1 mode 26 out");
		system("gpio -1 write 26 1");
    }
	else if (isset($_POST['tripAll']))
    {
		system("/home/pi/trip10.sh&");
    }
	
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>You know what this</title>
	<link rel="stylesheet" type="text/css" href="style.css" crossorigin="anonymous">
</head>
<div class="container">
	<form method="post">
	<h1>Main Machine</h1>
		<button class="button button-1" name="pwr">Power</button>
		<button class="button button-3" name="frc">Reboot</button>
		<button class="button button-2" name="sdown">ShutDown</button>		
	<h1>Relay Direct Control</h1>
		<button class="button button-1-sm" name="rly1On">1</button>
		<button class="button button-2-sm" name="rly1Off">1</button>	
		<button class="button button-1-sm" name="rly2On">2</button>
		<button class="button button-2-sm" name="rly2Off">2</button>		
		<button class="button button-1-sm" name="rly3On">3</button>
		<button class="button button-2-sm" name="rly3Off">3</button>		
		<button class="button button-1-sm" name="rly4On">4</button>
		<button class="button button-2-sm" name="rly4Off">4</button>
</p>	
		<button class="button button-1-sm" name="rly5On">5</button>
		<button class="button button-2-sm" name="rly5Off">5</button>	
		<button class="button button-1-sm" name="rly6On">6</button>
		<button class="button button-2-sm" name="rly6Off">6</button>		
		<button class="button button-1-sm" name="rly7On">7</button>
		<button class="button button-2-sm" name="rly7Off">7</button>		
		<button class="button button-1-sm" name="rly8On">8</button>
		<button class="button button-2-sm" name="rly8Off">8</button>
</p>
<button class="button button-1" name="tripAll">ringer</button>

    </form>
</div>	
</body>
</html>
