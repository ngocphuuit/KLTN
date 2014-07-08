<?php
Class Votes extends Eloquent{
	 protected $guarded = array(
        'id'
    );

	protected $table = 'article_votes';

	public $timestamps = false;

	public static function insertVote($id, $vote)
    {
        return Votes::insert(array(
                'art_id' => $id,
                'user_id' => Users::where('username',Session::get('user'))->pluck('user_id'),
                'vote' => $vote
        ));
    }
}