<?php
    if(isset($_POST['subutton'])){

        $config = [
            'dbname' => 'hng',
            'pass' => '@hng.intern1',
            'username' => 'intern',
            'host' => 'localhost'
        ];

        $dsn = 'mysql:host='.$config['host'].';dbname='.$config['dbname'];
        $con = new PDO($dsn, $config['username'], $config['pass']);

        $result = $con->query('SELECT * FROM password');
        $data = $result->fetch();
        $password = $data['password'];
        $to = $_POST['email'];
        $subject = $_POST['subject'];
        $body = $_POST['message'];
        header("location: ../sendmail.php?password=".$password."&subject=".$subject."&body=".$body."&to=".$to);

    }else{
        header("location: oluwawemimo.html");
    }
?>