<div class="data">
    <table>
        <?php

        ?>
        <tr>
            <td>




            </td>
</div>
<div class="data">
    <?php

    ?>

    <td>




    </td>
    </tr>

</div>
<?php
$v = $_POST['name'];
$sql = "select * from invoice_order where order_reciever_name='($v)' ";
$resu = mysqli_query($con, $sql);
while ($rows = mysqli_fetch_array($resu)) {
?>
    <tr>
        <td><?php echo $rows = ['order_id']  ?></td>
        <td><?php echo $rows = ['order_reciever_name']  ?></td>
        <td><?php echo $rows = ['order_date']  ?></td>
        <td><?php echo $rows = ['order_total_after_tax']  ?></td>
        <td><?php echo $rows = ['']  ?></td>
    </tr>

<?php
}
echo $sql;
?>