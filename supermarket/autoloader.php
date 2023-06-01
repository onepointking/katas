<?php

class Autoloader
{
    protected $namespaceMap = [];

    public function registerNamespace(string $namespace, string $directory): void
    {
        $directory = trim($directory, '/');
        $this->namespaceMap[$namespace] = $directory;
    }

    public function loadClass(string $class): void
    {
        $namespace = $this->getNamespace($class);
        $filePath = $this->getFilePath($class, $namespace);

        if ($filePath && file_exists($filePath)) {
            require_once $filePath;
        }
    }

    protected function getNamespace(string $class): string
    {
        $namespace = '';
        $lastNsPos = strrpos($class, '\\');

        if ($lastNsPos !== false) {
            $namespace = substr($class, 0, $lastNsPos);
        }

        return $namespace;
    }

    protected function getFilePath(string $class, string $namespace): ?string
    {
        foreach ($this->namespaceMap as $ns => $dir) {
            if ($namespace === $ns || strpos($class, $ns) === 0) {
                $relativeClass = substr($class, strlen($ns));
                $filePath = rtrim($dir, '/') . '/' . str_replace('\\', '/', $relativeClass) . '.php';
                return $filePath;
            }
        }

        return null;
    }
}

// Usage example:
$autoloader = new Autoloader();
$autoloader->registerNamespace('App', 'App');

spl_autoload_register([$autoloader, 'loadClass']);
