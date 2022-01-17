<div class="container-fluid mt-5">
    <div class="container">
        <h6><i class="fas fa-th"></i> &nbsp;All events listing</h6>
        <hr>
        <!-- <div class="col-sm-12"> -->
            <div class="row" id="elementtoScrollToID">
                <?php if($events->num_rows() > 0) {?>
                    <?php foreach($events->result() as $key => $event): ?>
                        <div class="col-sm-3 col-12 mb-3">
                            <div class="card cus-card-shadow">
                                <div class="card-body">
                                    <!-- <h5 class="card-title">Card title</h5> -->
                                    <h6 class="card-subtitle mb-1 text-muted"><?php echo $event->category_name; ?></h6>
                                    <small class="text-muted cus-sml-size mb-1">Event On : <?php echo date('d-F-Y',strtotime($event->event_event_date)); ?> <?php echo date('h:i A', strtotime($event->event_event_date)); ?></small>
                                    <p class="card-text"><?php echo substr($event->event_description,0,40); ?>...</p>
                                    <a href="javascript:;" rel="<?php echo $event->event_id; ?>" class="eventDetailsLink card-link text-pink cus-card-a-style">Details</a>
                                    <a href="javascript:;" rel="<?php echo $event->event_id; ?>" class="userDetailsLink card-link btn btn-sm text-white btn-indigo cus-card-a-style">Book Ticket</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php }else{ ?>
                <?php } ?>
            </div>
        <!-- </div> -->
    </div>
</div>