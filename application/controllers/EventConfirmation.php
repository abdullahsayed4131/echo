<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventConfirmation extends CI_Controller {

	public function __construct(){

		parent::__construct();
		/* Bookin Details Model */
		$this->load->model('front_end/BookingDetail');
        $this->load->library('pdf');
	 }

	public function confirmEventDetails(){

		$booked_unique_id = htmlspecialchars(strip_tags(trim($this->uri->segment(3))));

		/* Verify This Booking Id Exist Within The Database */
		$data['res']  = $this->BookingDetail->verifyBookingEvent($booked_unique_id);
		$details = $this->BookingDetail->getBookingEventAllDetails($booked_unique_id);
		$data['entdetail'] = $details->result();
        $data['title'] = 'Echo - Event Confirmation';
		$this->load->view('front_end/event_confirmation', $data);

	}

    public function convertpdf(){
 
            $booked_unique_id = htmlspecialchars(strip_tags(trim($this->uri->segment(3))));

            /* Verify This Booking Id Exist Within The Database */
            $data['res']  = $this->BookingDetail->verifyBookingEvent($booked_unique_id);
            $details = $this->BookingDetail->getBookingEventAllDetails($booked_unique_id);
            $data['entdetail'] = $details->result();
            $data['title'] = 'Echo - Event Confirmation';
            $this->load->view('front_end/event_confirmation', $data);

            $this->load->library('pdf');
            $html = $this->output->get_output();
            $this->pdf->loadHtml($html);
            $this->pdf->setPaper('A4','portrait');//landscape
            $this->pdf->render();
            $this->pdf->stream("booking-details.pdf", array('Attachment'=>1));
            //'Attachment'=>0 for view and 'Attachment'=>1 for download file
       }
}
