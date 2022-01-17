<!doctype html>
<html lang="en">

<head>
    <!-- All css & meta & title section -->
    <?php $this->load->view('partials/front_end/global_css'); ?>
</head>

<body class="bg-light">

    <!-- Navbar component -->
    <?php $this->load->view('components/front_end/navbar'); ?>

    <!-- Jumbotron component -->
    <?php $this->load->view('components/front_end/jumbotron'); ?>

    <!-- All events component -->
    <?php $this->load->view('components/front_end/events'); ?>

    <!-- Footer component -->
    <?php $this->load->view('components/front_end/footer'); ?>

    <!-- Model pop for details & book event -->
    <!-- Modal -->
    <div class="modal fade" id="eventDetailsPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Event Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered" id="eventInfo">

                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>
    <!-- Model pop for details & book event -->
    <!-- Modal -->
    <div class="modal fade" id="userDetailsPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Book Ticket for this Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                    <form id="bookEventForm">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" id="name">
                            <span class="name_error text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" name="email" class="form-control" id="email">
                            <span class="email_error text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label for="">Mobile</label>
                            <input type="text" name="mobile" class="form-control" id="mobile">
                            <span class="mobile_error text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label for="">Event Date</label>
                            <input type="text" name="date" class="form-control" id="dateinput" readonly>
                            <span class="date_error text-danger"></span>
                        </div>
                        <input type="hidden" name="event_id" class="evt_id">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary bookEventbtn">Book Ticket</button>
                </div>
            </div>
        </div>
    </div>

    <!-- All scripts section -->
    <?php $this->load->view('partials/front_end/global_scripts'); ?>
</body>

</html>