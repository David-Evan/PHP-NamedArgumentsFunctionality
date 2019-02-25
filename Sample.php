<?php
require('GenericObject.php');

/**
 * Cars has just to extends GenericObject to provide named argument functionnality.
 * Arguments are case-unsensitive.
 */
class Cars extends GenericObject{
    private $model, 
            $name, 
            $color;

    public function showDetails(){

        echo '- Model : '.$this->model.' - Name : '.$this->name.' - Color : '.$this->color;
    }


    /**
     * Getter / Setter
     */

    public function getModel() : string{
		return $this->model;
	}

	public function setModel($model) : void{
		$this->model = $model;
	}

	public function getName() : string{
		return $this->name;
	}

	public function setName($name) : void{
		$this->name = $name;
	}

	public function getColor() : string{
		return $this->color;
	}

	public function setColor($color) : void{
		$this->color = $color;
	}
}

$car = new Cars(['model' => 'Tesla',
                 'Name' => 'X',
                 'CoLor' => 'blue']
                );

$car->showDetails();