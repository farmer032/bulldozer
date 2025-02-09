<?php

class LoggerFactory {
    public static function createLogger($className): Logger {
        return new ConsoleLogger($className);
    }
}