<?php

namespace Api\Traits;

trait ApiMethods
{
    public function getContents($input = 'php://input')
    {
        $input = json_decode(file_get_contents($input), true);

        return $input;
    }
}
