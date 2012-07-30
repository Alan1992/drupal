<?php
echo "Git pull example on php <br />";

$descriptorspec = array(
			1 => array('pipe', 'w'),
			2 => array('pipe', 'w'),
		);
		$pipes = array();
		$path = "/usr/bin/git";
		$command = "git commit -m 'Oh my head....'";
		$resource = proc_open($command, $descriptorspec, $pipes, $path);

		$stdout = stream_get_contents($pipes[1]);
		$stderr = stream_get_contents($pipes[2]);
		foreach ($pipes as $pipe) {
			fclose($pipe);
		}

		$status = trim(proc_close($resource));
		if ($status) throw new Exception($stderr);

		echo $stdout;