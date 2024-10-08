<?php
// my-component.php
?>

<div class="container">
 
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Apply Now
    </button>
 
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered career-modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Join with us</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque voluptate impedit eius odit, consequuntur magnam dignissimos quis architecto sunt incidunt. </p>
                    <?php echo do_shortcode('[contact-form-7 id="9ac7a2c" title="Popup"]'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
