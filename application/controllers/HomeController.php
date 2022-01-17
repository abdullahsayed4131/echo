<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

	public function __construct(){

		parent::__construct();
		/* Event Model */
		$this->load->model('front_end/Event');
		/* Bookin Details Model */
		$this->load->model('front_end/BookingDetail');
	 }

	public function index(){

		/* Load all events */
		$data['events']  = $this->Event->getAllEvents();
        $data['title']   = 'Echo - index page';
		$this->load->view('front_end/index', $data);

	}

	public function about(){

		$data['title'] = 'Echo - about page';
		$this->load->view('front_end/about', $data);

	}

	public function eventDetails(){

		/* Verify request must be post */
		if($this->input->server('REQUEST_METHOD') === 'POST'){

            $event_id = htmlspecialchars(strip_tags($this->input->post('eventId')));
			/* Get single event data */
		    $event  = $this->Event->getSingleEvent($event_id);
			$event_details = $event->result();
            
			$data = '<tr>
			        <th class="cus-th-width">Event Name:</th>
					<td>'.$event_details[0]->event_name.'</td>
			        </tr>
					<tr>
			        <th class="cus-th-width">Event Description:</th>
					<td>'.$event_details[0]->event_description.'</td>
			        </tr>
					<tr>
			        <th class="cus-th-width">Event Date:</th>
					<td>'.date('d-F-Y',strtotime($event_details[0]->event_date)).' '.date('h:i A', strtotime($event_details[0]->event_date)).'</td>
			        </tr>
					<tr>
			        <th class="cus-th-width">Entry Fee:</th>
					<td>'.$event_details[0]->event_price.' Rs.</td>
			        </tr>
					<tr>
			        <th class="cus-th-width">Event Location:</th>
					<td>'.$event_details[0]->location_name.'</td>
			        </tr>
					<tr>
			        <th class="cus-th-width">Category:</th>
					<td>'.$event_details[0]->category_name.'</td>
			        </tr>
					<tr>
			        <th class="cus-th-width">Technology:</th>
					<td>'.$event_details[0]->technologies_name.'</td>
			        </tr>';
			
			$arr = array('status' => 200, 'data' => $data);

			/* Send data through json */
			header('Content-Type: application/json');
            echo json_encode( $arr );

		}

	}

	public function singleEventDetails(){
		/* Verify request must be post */
		if($this->input->server('REQUEST_METHOD') === 'POST'){

            $event_id = htmlspecialchars(strip_tags($this->input->post('eventId')));
			/* Get single event data */
		    $event  = $this->Event->getSingleEventDetails($event_id);
			$event_date = $event[0]->event_date; //date("d/m/Y", strtotime($event_details[0]->event_date));
			
			$arr = array('status' => 200, 'date' => $event_date, 'id' => $event[0]->id);
			/* Send data through json */
			header('Content-Type: application/json');
            echo json_encode( $arr );

		}
	}

	public function bookEvent(){

		/* Verify request must be post */
		if($this->input->server('REQUEST_METHOD') === 'POST'){

			/* From Validation */
			$this->form_validation->set_rules('name',   'Name',    'required|trim|min_length[5]|max_length[15]|regex_match[/^[a-zA-Z\s]+$/]');
			$this->form_validation->set_rules('email',  'Email',   'required|valid_email|trim|is_unique[booking_details.email]');
			$this->form_validation->set_rules('mobile', 'Mobile',  'required|trim|regex_match[/^[7-9][0-9]{9}$/]|is_unique[booking_details.mobile]');
			$this->form_validation->set_rules('date',   'Date',    'required|trim');

			/* Custome Valiation Messages */
			$this->form_validation->set_message('regex_match', 'Invalid %s format');
			$this->form_validation->set_message('is_unique', 'Already this %s exist');

			if($this->form_validation->run()){

                /* Load Helper gor get random number */
				$this->load->helper('random_number');
				$random_number = random_number($length=8);
				/* Get event date */
				$res  = $this->BookingDetail->getEventDate($this->input->post('event_id'));

				/* Insert Data */ 
				$data = array(
                   'name'           => htmlspecialchars(strip_tags($this->input->post('name'))),
				   'email'          => htmlspecialchars(strip_tags($this->input->post('email'))),
				   'mobile'         => htmlspecialchars(strip_tags($this->input->post('mobile'))),
				   'booking_unq_id' => $random_number,
				   'selected_date'  => $res[0]->event_date,
				   'event_id'       =>htmlspecialchars(strip_tags($this->input->post('event_id'))),
				);

				$res  = $this->BookingDetail->saveBookingEvent($data);
				if($res){

					$this->session->set_flashdata('success', 'Successfully Booking Completed.');
					$arr = array(
						'status'   => 200,
						'booking_id' => $res[0]->booking_unq_id
					);
				}

			}else{
				$arr = array(
					'status'   => 201,
					'error'   => true,
					'name_error' => form_error('name'),
					'email_error' => form_error('email'),
					'mobile_error' => form_error('mobile'),
					'date_error' => form_error('date')
				);  
			}

			/* Send data through json */
			header('Content-Type: application/json');
            echo json_encode( $arr );

		}
	}
}
