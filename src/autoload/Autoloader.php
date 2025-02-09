<?php


class Autoloader {

    private $rootDir = __DIR__;

    public function __construct(string $rootDir) {
        $this->rootDir = $rootDir;
    }

    public function loadClasses() {
        spl_autoload_register(function($className) {
            return $this->loadClassInternal($className);
        });
    }

    private function loadClassInternal(string $className) {
        $directory = new RecursiveDirectoryIterator($this->rootDir, RecursiveDirectoryIterator::SKIP_DOTS);
        $fileIterator = new RecursiveIteratorIterator($directory, RecursiveIteratorIterator::LEAVES_ONLY);
        foreach ($fileIterator as $file) {
            if ($file->isFile() && $file->getFileName() === ($className . '.php')) {
                $filePath = $file->getPathname();
                if (file_exists($filePath)) {
                    include_once $filePath;
                    return true;
                }
            }
        }
        return false;
    }
}