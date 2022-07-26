<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Assets
{

    public function collection($type)
    {
        $this->type = $type;
        return $this;
    }

    public function addJs($js = null)
    {
        $this->collection[$this->type] = [$js];
    }

    public function addCss($css = null)
    {
        $this->collection[$this->type] = [$css];
    }

    public function outputCss($type = null)
    {
        if (isset($this->collection[$type])) {
            foreach ($this->collection[$type] as $val) {
                echo '<link href="' . $val . '" rel="stylesheet">' . PHP_EOL;
            }
        }
    }

    public function outputJs($type = null)
    {
        if (isset($this->collection[$type])) {

            foreach ($this->collection[$type] as $val) {
                echo '<script src="' . $val . '"></script>' . PHP_EOL;
            }
        }
    }
}
