<?php


namespace CImrie\FlightSorter;


abstract class BoardingPass {

	/**
	 * @var string
	 */
	protected $source;

	/**
	 * @var string
	 */
	protected $destination;

	/**
	 * @var string
	 */
	protected $departureNumber;

	/**
	 * @return string
	 */
	public function getSource()
	{
		return $this->source;
	}

	/**
	 * @param string $source
	 *
	 * @return $this
	 */
	public function setSource($source)
	{
		$this->source = $source;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getDestination()
	{
		return $this->destination;
	}

	/**
	 * @param string $destination
	 *
	 * @return $this
	 */
	public function setDestination($destination)
	{
		$this->destination = $destination;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getDepartureNumber()
	{
		return $this->departureNumber;
	}

	/**
	 * @param string $departureNumber
	 *
	 * @return $this
	 */
	public function setDepartureNumber($departureNumber)
	{
		$this->departureNumber = $departureNumber;

		return $this;
	}

	/**
	 * @param array $data
	 *
	 * @return $this
	 */
	public function fromArray(array $data) {
		$this->setSource($data['from']);
		$this->setDestination($data['to']);

		return $this;
	}

	/**
	 * @return string
	 */
	public abstract function getDirections();
}