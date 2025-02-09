<?php

class ConsoleLogger extends AbstractLogger {

    private $stderr;
    private $stdout;

    public function __construct() {
        $this->stdout = fopen('php://stdout', 'w');
        $this->stderr = fopen('php://stdout', 'w');
    }

    public function logMessage($level, $template, ...$params) {
        $payload = sprintf($template, ...$params);

        $date = new DateTime();
        $formatted = $date->format("D M d H:i:s Y");

        $remoteAddr = $_SERVER["REMOTE_ADDR"];

        $logRecord = sprintf("[%s] [%s] %s\n", $formatted, $remoteAddr, $payload);


        match ($level) {
            LoggingLevel::INFO => $this->logToStdout($logRecord),
            LoggingLevel::WARN => $this->logToStderr($logRecord)
        };
    }


    private function logToStdout($logRecord) {
        fwrite($this->stdout, $logRecord);
    }

    
    private function logToStderr($logRecord) {
        fwrite($this->stdout, $logRecord);
    }
}