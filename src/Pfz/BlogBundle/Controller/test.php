<?php


class EmailLogger {
    function __construct() {
        $this->mailer = new Mailer();
    }

    function log($message) {
        $this->mailer->send("jthijssen@noxlogic.nl", $message);
    }
}

class DBLogger {
    function log($message) {
        mysql_query("INSERT $message");
    }
}



class Logger {

    function setLogger($logger) {
        $this->logger = $logger;
    }

    function Log($message) {
        $this->logger->log($message);
    }
}

$email = new EmailLogger();
$db = new DbLogger();

$log = new Logger();
$log->setLogger($db);
$log->log("ojee, het gaat fout");

$log->setLogger($email);
$log->log("ojee, dit wordt geemailed");
