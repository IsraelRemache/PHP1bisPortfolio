<?php 

    if(isset($_POST['button'])){
        session_unset();
    }

?>


<h3>Winkelmand</h3>

<?php if(isset($_SESSION["cart"])) : ?>
<ul>
    <?php foreach( $_SESSION["cart"] as $c) : ?>
        <li> <?php echo $c;?> </li>
    <?php endforeach; ?>
    
    <form action="" method="post">
        <input type="submit" name="button" value="Clear">
    </form>
</ul>
<?php else : ?>
    <p>Lege mandje;</p>
<?php endif; ?>