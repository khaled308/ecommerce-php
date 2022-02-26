<?php
    $pending = 0 ;
    foreach($_SESSION['members_data'] as $row){
        if($row['register_status'] == 0) $pending++;
    }
?>
<div class="container">
    <h2 class="text-center mb-5">Dashboard</h2>
    <div class="row">
        <div class="col-sm-3 stats">
            <div class="content">
                <h4>Total Member</h4>
                <span>200</span>
            </div>
        </div>
        <div class="col-sm-3 stats">
            <div class="content">
                <h4>Pending Members</h4>
                <span><?= $pending ?></span>
            </div>
        </div>
        <div class="col-sm-3 stats">
            <div class="content">
                <h4>Total Items</h4>
                <span>200</span>
            </div>
        </div>
        <div class="col-sm-3 stats">
            <div class="content">
                <h4>Total Comments</h4>
                <span>200</span>
            </div>
        </div>
    </div>
</div>

<div class="container latest">
    <div class="row">
        <div class="col-sm-6">   
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>
        </div>
    </div>
</div>