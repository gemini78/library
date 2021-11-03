<?php 
if(isset($_SESSION['notification']['message'])): ?>
    <div class="alert alert-<?= $_SESSION['notification']['type'] ?>">
        <div class="wrapper">
            <h4><?= $_SESSION['notification']['message']  ?></h4>
        </div>
    </div>
    <?php $_SESSION['notification'] = [];?>
<?php endif;