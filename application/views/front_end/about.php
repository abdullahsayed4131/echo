<!doctype html>
<html lang="en">

<head>
    <!-- All css & meta & title section -->
    <?php $this->load->view('partials/front_end/global_css'); ?>
</head>

<body class="bg-light">

    <!-- Navbar component -->
    <?php $this->load->view('components/front_end/navbar'); ?>

    <!-- About Us Component -->
    <div class="container-fluid mt-5">
        <div class="container">
            <h5>Simple About Us page.</h5>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
        </div>
    </div>

    <!-- All scripts section -->
    <?php $this->load->view('partials/front_end/global_scripts'); ?>
</body>

</html>