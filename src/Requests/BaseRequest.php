<?php

declare(strict_types=1);

namespace Harryqt\NowPayments\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

abstract class BaseRequest extends Request
{
    protected Method $method = Method::GET;

    /**
     * Return constructor parameters as array
     */
    protected function getConstructorParams(): array
    {
        $parameters = [];
        foreach (new \ReflectionClass($this)->getConstructor()->getParameters() as $param) {
            $name = $param->getName();
            $parameters[$name] = $this->{$name};
        }

        return $parameters;
    }
}
