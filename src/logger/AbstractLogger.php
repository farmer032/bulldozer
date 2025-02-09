<?php

abstract class AbstractLogger implements Logger {

    public function info($template, ...$params) {
        $this->logMessage(LoggingLevel::INFO, $template, ...$params);
    }

    public function warn($template, ...$params) {
        $this->logMessage(LoggingLevel::WARN, $template, ...$params);
    }

    abstract function logMessage($level, $template, ...$params);
}