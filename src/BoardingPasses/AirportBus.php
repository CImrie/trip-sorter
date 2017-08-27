<?php


namespace CImrie\FlightSorter\BoardingPasses;


use CImrie\FlightSorter\BoardingPass;

class AirportBus extends BoardingPass {

	public function getDirections()
	{
		return sprintf("Take the airport bus from %s to %s. %s.", $this->getSource(), $this->getDestination(), $this->getSeat());
	}

}