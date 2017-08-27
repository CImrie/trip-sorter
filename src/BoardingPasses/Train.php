<?php


namespace CImrie\FlightSorter\BoardingPasses;


use CImrie\FlightSorter\BoardingPass;

class Train extends BoardingPass {

	/**
	 * @param array $data
	 *
	 * @return $this
	 */
	public function fromArray(array $data)
	{
		parent::fromArray($data);
		$this->setDepartureNumber($data['train']);

		return $this;
	}

	public function getDirections()
	{
		return sprintf("Take train %s from %s to %s. Sit in seat %s.",
			$this->getDepartureNumber(),
			$this->getSource(),
			$this->getDestination(),
			$this->getSeat()
		);
	}


}