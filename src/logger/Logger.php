<?php

interface Logger {
    function info($template, ...$params);
    function warn($template, ...$params);
}