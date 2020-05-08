<?php

/*
 * This file is part of the tuowt/eduyun-bmp.
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Eduyun;

/**
 * Class Factory.
 *
 * @method static \Eduyun\Base\Application base(array $config)
 * @method static \Eduyun\Cert\Application cert(array $config)
 */
class Factory
{
    /**
     * @param string $name
     * @param array  $config
     *
     * @return \Eduyun\\Kernel\ServiceContainer
     */
    public static function make($name, $config)
    {
        $namespace = Kernel\Support\Str::studly($name);
        $application = "\\Eduyun\\{$namespace}\\Application";

        return new $application($config);
    }

    /**
     * Dynamically pass methods to the application.
     *
     * @param string $name
     * @param array  $arguments
     *
     * @return mixed
     */
    public static function __callStatic($name, $arguments)
    {
        return self::make($name, $arguments[0]);
    }
}
