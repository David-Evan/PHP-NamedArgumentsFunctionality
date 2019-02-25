<?php
/**
 * @author David EVAN
 * @source http://github.com/David-Evan/PHP-NamedArgumentsFunctionnality
 * @copyright LICENCE M.I.T
 *
 * This tiny class is an very usefull shortcut to provide named arguments functionnality to any PHP object. 
 * You just have to extend your object with this GenericObject
 * Arguments is case-unsensitive.
 */
abstract class GenericObject{

    /**
     * You can overload this method. By default, you can use constructor to set named parameters
     * @param array $params - Array of parameters with : ['ParamName' => 'ParamValue'];
     */
    public function __construct(array $params = []) {
        $this->setParameters($params);
    }

   /**
     * Use an associative array to set all parameters of the object.
     * @param array $params - Array of parameters with : ['ParamName' => 'ParamValue']
     * @return void
     */
    public function setParameters(array $params = []) : void {
        if(empty($params))
            return;

        foreach($params as $paramName => $paramValue){
            $method = 'set'.ucfirst($paramName);
            $this->{$method}($paramValue);
        }
    }
}