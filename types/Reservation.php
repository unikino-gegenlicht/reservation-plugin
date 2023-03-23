<?php


/**
 * A reservation that was made from the frontend
 *
 * The reservation is created as soon as the user clicks on the appropriate
 * button for triggering the reservation. It contains the movie the reservation
 * was made for referenced by its id.
 *
 * It also contains the name and email address of the person that made the
 * reservation. It also contains an id for external usage to cancel a
 * reservation made by a user.
 *
 * @since 1.0.0
 * @package Reservation_Plugin
 * @subpackage Reservation_Plugin types
 * @author Jan Eike Suchard <jan+WordPressPlugin@suchard.cloud>
 */
class Reservation {

	/**
	 * The internal reservation id
	 * @var string
	 */
	var string $id;

	/**
	 * The id of the movie the reservation was made for
	 * @var string
	 */
	var string $movieID;

	/**
	 * The full name of the person who made the reservation
	 * @var string
	 */
	var string $name;

	/**
	 * The email address of the person who made the reservation
	 * @var string
	 */
	var string $email;

	/**
	 * The number of seats that have been reserved with this reservation
	 * @var int
	 */
	var int $seats;

	public function __construct(
		string $movieID,
		string $name,
		string $email,
		int $seats
	) {
		// create an uuid for the reservations external id
		$this->id = wp_generate_uuid4();
		$this->movieID = $movieID;
		$this->name = $name;
		$this->email = $email;
		$this->seats = $seats;
	}

}