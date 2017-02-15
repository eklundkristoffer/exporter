<?php

namespace pandaac\Exporter\Parsers;

use pandaac\Exporter\Output;
use pandaac\Exporter\Exporter;
use pandaac\Exporter\Engines\OTBM;
use pandaac\Exporter\Contracts\Parser as Contract;

class Towns implements Contract
{
    /** 
     * Get the relative file path.
     *
     * @return string
     */
    public function filePath()
    {
        return '/data/world/forgotten.otbm';
    }

    /**
     * Get the parser engine.
     *
     * @param  array  $attributes
     * @return \pandaac\Exporter\Contracts\Engine
     */
    public function engine(array $attributes)
    {
        return new OTBM($attributes);
    }

    /**
     * Parse the file.
     *
     * @param  \pandaac\Exporter\Exporter  $exporter
     * @param  \pandaac\Exporter\Output  $output
     * @param  array  $attributes
     * @return \Illuminate\Support\Collection
     */
    public function parse(Exporter $exporter, Output $output, array $attributes)
    {
        return $output;
    }
}
