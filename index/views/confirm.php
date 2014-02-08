<h3>Transaction Succesful</h3>
<label class="dblock mb">We sent you an e-mail with your receipt and transaction details. Thank you for using BlastPress.</label>
<?php 
    switch($_SESSION['job']['delivery_status']) {
        case 'Queued':
            $color = 'yellow';
            break;
        case 'In Progress':
            $color = 'greeen';
            break;
        case 'Complete':
            $color = 'red';
            break;
    }
?>
<h4 class="darkgrey">Delivery Status: <span class="<?php echo $color; ?>"><?php echo $_SESSION['job']['delivery_status']; ?></span></h4>
