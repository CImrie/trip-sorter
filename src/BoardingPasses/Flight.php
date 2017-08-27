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
	protected $seat;

	/**
	 * @var string
	 */
	protected $gate;

	/**
	 * @var string
	 */
	protected $flightNumber;

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
	public function getSeat()
	{
		return $this->seat;
	}

	/**
	 * @param string $seat
	 *
	 * @return Flight
	 */
	public function setSeat($seat)
	{
		$this->seat = $seat;

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
	 * @return string
	 */
	public function getFlightNumber()
	{
		return $this->flightNumber;
	}

	/**
	 * @param string $flightNumber
	 *
	 * @return Flight
	 */
	public function setFlightNumber($flightNumber)
	{
		$this->flightNumber = $flightNumber;

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
		$this->seat = $data['seat'];
		$this->gate = $data['gate'];
		$this->flightNumber = $data['flight'];

		return $this;
	}
}