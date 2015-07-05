<?php

namespace AppBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class AppBundle extends Bundle
{
    protected static $uploadRootDir;

    public static function getUploadRootDir() {
        return self::$uploadRootDir;
    }

    public function boot()
    {
        self::$uploadRootDir = $this->container->getParameter('upload_root_dir');
    }
}
