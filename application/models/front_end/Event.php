<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Model {

        public function getAllEvents(){

                $this->db->from('events');
                $this->db->join('categories', 'categories.id=events.category_id', 'inner');
                $this->db->select(
                        'events.id  as event_id, 
                         events.name as event_name,
                         events.event_date as event_event_date, 
                         events.description as event_description, 
                         categories.name as category_name'
                );
                $query = $this->db->get();
                return $query;

        }

        public function getSingleEvent($event_id){

                $this->db->from('events');
                $this->db->join('categories', 'categories.id=events.category_id', 'inner');
                $this->db->join('technologies', 'technologies.id=events.technology_id', 'inner');
                $this->db->join('locations', 'locations.id=events.location_id', 'inner');
                $this->db->select( 
                        'events.name as event_name, 
                        events.description as event_description,
                        events.price as event_price, 
                        categories.name as category_name,
                        technologies.name as technologies_name,
                        locations.name as location_name,
                        events.event_date'
                        
                );
                $this->db->where('events.id',$event_id);
                $query = $this->db->get();
                return $query;

        }

        public function getSingleEventDetails($event_id){

                $this->db->from('events');
                $this->db->select('id,event_date');
                $this->db->where('id',$event_id);
                $query = $this->db->get();
                return $query->result();
        }

        
}