<?php
Class Follow extends Eloquent{
	protected $guarded = array(
        'id'
    );

	protected $table = 'user_follow';

	public $timestamps = false;
}