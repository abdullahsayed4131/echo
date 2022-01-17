<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BookingDetail extends CI_Model {

    public function saveBookingEvent($data){

        $this->db->insert('booking_details',$data);
        $last_inserted_id = $this->db->insert_id();

        $this->db->select('*');
        $this->db->from('booking_details');
        $this->db->where('id', $last_inserted_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function verifyBookingEvent($booked_unique_id){

        $this->db->select('*');
        $this->db->from('booking_details');
        $this->db->where('booking_unq_id', $booked_unique_id);
        $query = $this->db->get();
        return $query;
    }

    public function getBookingEventAllDetails($booked_unique_id){
        $this->db->from('booking_details');
        $this->db->join('events', 'events.id = booking_details.event_id', 'inner');
        $this->db->join('locations', 'locations.id=events.location_id', 'inner');
        $this->db->select('
        booking_details.name as user_name,
        booking_details.created_at as user_created_at,
        booking_details.booking_unq_id as user_booking_unq_id,
        booking_details.email as user_email,
        booking_details.mobile as user_mobile,
        booking_details.selected_date as user_selected_date,
        events.name as event_name,
        events.price as event_price,
        events.event_date as event_event_date,
        locations.name as location_name
        ');
        $this->db->where('booking_details.booking_unq_id', $booked_unique_id);
        $query = $this->db->get();
        return $query;
    }

    public function getEventDate($event_id){
        $this->db->select('event_date');
        $this->db->from('events');
        $this->db->where('id', $event_id);
        $query = $this->db->get();
        return $query->result();
    }
}