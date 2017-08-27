<?php


namespace CImrie\FlightSorter\BoardingPasses;


use CImrie\FlightSorter\BoardingPass;

class Train extends BoardingPass {

	/**
	 * @var string
	 */
	protected $seat;

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
	 * @return Train
	 */
	public function setSeat($seat)
	{
		$this->seat = $seat;

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
		$this->seat = $data['seat'];
		$this->setDepartureNumber($data['train']);

		return $this;
	}
}