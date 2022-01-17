<!doctype html>
<html lang="en">

<head>
    <!-- All css & meta & title section -->
    <?php $this->load->view('partials/front_end/global_css'); ?>
    <style>
    table, th, td {
    border: 1px solid black !important;
    padding: 8px;
    }
    table {
        width: 100% !important;
    }
    .cus-right{
        position: relative;
        left: -5vw !important;
    }
    .cus-head{
        margin-bottom: 1rem !important;
    }
    </style>
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8 card">
             <?php if($this->session->flashdata('success')){  ?>
                <div class="alert alert-success alert-dismissible fade show mt-2 mb-2" role="alert">
                <?php echo $this->session->flashdata('success') ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
             <?php } ?>
              <div class="card-body">
                <?php if($res->num_rows() > 0) {?>
                  <div class="crad-title mb-2 cus-head">
                      Booking Id : #<?php echo $entdetail[0]->user_booking_unq_id; ?>  <span class="float-right cus-right"> <a href='<?php echo base_url("event/printPDF/".$entdetail[0]->user_booking_unq_id) ?>'><i class="fas fa-file-pdf"></i> Print Pdf</a> </span>
                  </div>
                  <table>
                      

                        <tr>
                            <th>Name:</th>
                            <td><?php echo $entdetail[0]->user_name; ?></td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td><?php echo $entdetail[0]->user_email; ?></td>
                        </tr>
                        <tr>
                            <th>Mobile:</th>
                            <td><?php echo $entdetail[0]->user_mobile; ?></td>
                        </tr>
                        <tr>
                            <th>Event Name:</th>
                            <td><?php echo $entdetail[0]->event_name; ?></td>
                        </tr>
                        <tr>
                            <th>Event Date:</th>
                            <td><?php echo date('d-F-Y',strtotime($entdetail[0]->event_event_date)); ?>  <?php echo date('h:i A', strtotime($entdetail[0]->event_event_date)); ?></td>
                        </tr>
                        <tr>
                            <th>Location:</th>
                            <td><?php echo $entdetail[0]->location_name; ?></td>
                        </tr>
                        <tr>
                            <th>Entry Fee:</th>
                            <td><?php echo $entdetail[0]->event_price; ?> Rs.</td>
                        </tr>
                  </table>
                <?php }else{ ?>
                    <div class="alert alert-danger" role="alert">
                    <i class="fas fa-exclamation-triangle"></i> Invalid Booking Id <span class="float-right"><a href="<?php echo base_url('/'); ?>">Go to home</a></span>
                    </div>
                <?php } ?>
              </div>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div>




    <!-- All scripts section -->
    <?php $this->load->view('partials/front_end/global_scripts'); ?>
</body>

</html>