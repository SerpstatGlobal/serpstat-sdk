<?php

namespace Serpstat\Tests;

trait EasyMockObjectTrait
{
    /**
     * @param string $originalClassName
     * @param array $methods ['methodName' => 'returnData']
     * @param bool $disableConstructor
     *
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function createMockEasy($originalClassName, array $methods = [], $disableConstructor = true)
    {
        $mockBuilder = new \PHPUnit_Framework_MockObject_MockBuilder($this, $originalClassName);
        if ($disableConstructor) {
            $mockBuilder->disableOriginalConstructor();
        }
        $mock = $mockBuilder->getMock();
        foreach ($methods as $methodName => $methodReturn) {
            $mock->method($methodName)
                ->will(new \PHPUnit_Framework_MockObject_Stub_Return($methodReturn));
        }

        return $mock;
    }
}
