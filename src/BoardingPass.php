<?php


namespace CImrie\FlightSorter;


class BoardingPass {

	/**
	 * @var string
	 */
	protected $source;

	/**
	 * @var string
	 */
	protected $destination;

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
	 * @return BoardingPass
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
	 * @return BoardingPass
	 */
	public function setDestination($destination)
	{
		$this->destination = $destination;

		return $this;
	}
}