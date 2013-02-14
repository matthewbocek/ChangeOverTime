<?php

function ct_get_status($post_id)
{
	$ct_lead_time = get_field( 'lead_time',$post_id ) * 60 * 60 * 24; //convert to seconds
	$ct_start_date = strtotime( get_field( 'start_date',$post_id ) );
	$ct_lead_date = $ct_start_date - $ct_lead_time;
	$ct_end_date = strtotime( get_field( 'end_date',$post_id ) );
	$ct_today = time();
	
	$status = array(
		lead_date  => false,
		start_date => false,
		end_date   => false
	);

	if( $ct_lead_date <= $ct_today )
		$status[lead_date] = true;
	
	if( $ct_start_date <= $ct_today )
		$status[start_date] = true;
	
	if( $ct_end_date < $ct_today )
		$status[end_date] = true;

	return $status;
}

function ct_get_template($post_id,$ct_template_list)
{
	$ct_lead_time = get_field( 'lead_time',$post_id ) * 60 * 60 * 24; //convert to seconds
	$ct_start_date = strtotime( get_field( 'start_date',$post_id ) );
	$ct_lead_date = $ct_start_date - $ct_lead_time;
	$ct_end_date = strtotime( get_field( 'end_date',$post_id ) );
	$ct_today = time();

	$status = array(
		lead_date  => false,
		start_date => false,
		end_date   => false
	);

	if( $ct_end_date < $ct_today )
		return $ct_template_list[3];
		
	if( $ct_start_date <= $ct_today )
		return $ct_template_list[2];
	
	if( $ct_lead_date <= $ct_today )
		return $ct_template_list[1];
		
	return $ct_template_list[0];
}

function ct_get_template($ct_template_list)
{	
	$ct_lead_time = get_field( 'lead_time',$post_id ) * 60 * 60 * 24; //convert to seconds
	$ct_start_date = strtotime( get_field( 'start_date',$post_id ) );
	$ct_lead_date = $ct_start_date - $ct_lead_time;
	$ct_end_date = strtotime( get_field( 'end_date',$post_id ) );
	$ct_today = time();

	$status = array(
		lead_date  => false,
		start_date => false,
		end_date   => false
	);

	if( $ct_end_date < $ct_today )
		return $ct_template_list[3];
		
	if( $ct_start_date <= $ct_today )
		return $ct_template_list[2];
	
	if( $ct_lead_date <= $ct_today )
		return $ct_template_list[1];
		
	return $ct_template_list[0];
}

function ct_get_template()
{
	$post_id = the_id();
	
	$ct_template_list = array (
		'hidden'	  , //post has not reached its lead date
		'coming_soon' , //post has passed its lead date but not its start date
		'now_playing' , //post has passed its start date but not its end date
		'closed'	  , //post has passed its end date
	);
	
	$ct_lead_time = get_field( 'lead_time',$post_id ) * 60 * 60 * 24; //convert to seconds
	$ct_start_date = strtotime( get_field( 'start_date',$post_id ) );
	$ct_lead_date = $ct_start_date - $ct_lead_time;
	$ct_end_date = strtotime( get_field( 'end_date',$post_id ) );
	$ct_today = time();

	$status = array(
		lead_date  => false,
		start_date => false,
		end_date   => false
	);

	if( $ct_end_date < $ct_today )
		return $ct_template_list[3];
		
	if( $ct_start_date <= $ct_today )
		return $ct_template_list[2];
	
	if( $ct_lead_date <= $ct_today )
		return $ct_template_list[1];
		
	return $ct_template_list[0];
}

?>