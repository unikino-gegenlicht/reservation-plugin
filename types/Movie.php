<?php

/**
 * A Movie that was created from a WordPress post
 *
 * The movie object can be created manually or may be created from
 * a WP_Post. When creating the movie from a WordPress Post the
 * metadata is automatically calculated from the post data
 *
 * @since 1.0.0
 * @package Reservation_Plugin
 * @subpackage Reservation_Plugin/types
 * @author Jan Eike Suchard <jan+WordPressPlugin@suchard.cloud>
 *
 */
class Movie {

	/**
	 * The ID of the WordPress post that is a movie
	 * @var string
	 */
	var string $post_id;

	/**
	 * The name of the movie
	 * @var string
	 */
	var string $name;

	/**
	 * A boolean that sets if the title may be shown externally
	 * @var bool
	 */
	var bool $public;

	/**
	 * An indicator if the reservation is enabled or not
	 * @var bool
	 */
	var bool $reservationEnabled;

	/**
	 * The amount of reservable seats for this movie
	 * @var int
	 */
	var int $reservable_seats;

	/**
	 * Create a new Movie
	 *
	 * @param string $id
	 * @param string $name
	 * @param bool $isPublic
	 * @param bool $isReservable
	 * @param int $reservable_seats
	 */
	function __construct(
		string $id,
		string $name,
		bool $isPublic,
		bool $isReservable,
		int $reservable_seats,
	) {
		$this->post_id = $id;
		$this->name = $name;
		$this->public = $isPublic;
		$this->reservationEnabled = $isReservable;
		$this->reservable_seats = $reservable_seats;
	}

	static function fromPost(WP_Post $post): Movie {
		// get some metadata for the movie constructor
		$isPublic = get_metadata('post', $post->ID, 'hauptfilm_license_ok', true);
		$reservationEnabled = get_metadata('post', $post->ID, 'reservierung_ok', true);
		$reservableSeats = get_metadata('post', $post->ID, 'reservierung_reservable_seats', true);
		// create the movie and return it
		return new Movie($post->ID, $post->post_title, $isPublic, $reservationEnabled, $reservableSeats);
	}

	public function freeSeats(): int {

	}
}