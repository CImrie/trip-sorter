<?php


namespace CImrie\FlightSorter\BoardingPasses;


use CImrie\FlightSorter\BoardingPass;

class Flight extends BoardingPass {

	/**
	 * @var string
	 */
	protected $baggageInformation;

	/**
	 * @var string
	 */
	protected $gate;

	/**
	 * @return string
	 */
	public function getBaggageInformation()
	{
		return $this->baggageInformation;
	}

	/**
	 * @param string $baggageInformation
	 *
	 * @return Flight
	 */
	public function setBaggageInformation($baggageInformation)
	{
		$this->baggageInformation = $baggageInformation;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getGate()
	{
		return $this->gate;
	}

	/**
	 * @param string $gate
	 *
	 * @return Flight
	 */
	public function setGate($gate)
	{
		$this->gate = $gate;

		return $this;
	}

	/**
	 * @param array $data
	 *
	 * @return $this
	 */
	public function fromArray(array $data)
	{
		parent::fromArray($data);

		$this->baggageInformation = $data['baggage'];
		$this->gate               = $data['gate'];
		$this->departureNumber    = $data['flight'];

		return $this;
	}

	/**
	 * @return string
	 */
	public function getDirections()
	{
		return sprintf("From %s, take flight %s to %s. Gate %s, seat %s. %s.",
			$this->getSource(),
			$this->getDepartureNumber(),
			$this->getDestination(),
			$this->getGate(),
			$this->getSeat(),
			$this->getBaggageInformation()
		);
	}
}