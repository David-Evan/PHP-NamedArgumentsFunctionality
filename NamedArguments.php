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
trait NamedArguments{

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
     * @return bool - true if array can be loaded;
     */
    public function setParameters(array $params = []) : bool {
        if(empty($params))
            return false;

        foreach($params as $paramName => $paramValue){
            $method = 'set'.ucfirst($paramName);
            $this->{$method}($paramValue);
        }
        return true;
    }

    /**
     * Same as "setParameters" but use JSON data instead of an array
     * @param string $JSONParams
     * @return bool - true if json data can be loaded
     */
    public function setJSONParameters(string $JSONParams) : bool {
        return setParameters(json_decode($JSONParams, true));
    }

}