<?php
    include 'includes/conn.php';
?>
 
<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>SuPu Store | Contact Us Queries</title>
    <link href="img/logo.png" rel="icon">
    <style>
        .pending{
            background-color: tomato;
            color: aliceblue;
            padding: 4px 8px;
            border: 1px solid black;
            border-radius: 3px;
        }

        .completed{
            background-color: #4BB543;
            color: aliceblue;
            padding: 4px 8px;
            border: 1px solid black;
            border-radius: 3px;
        }
    </style>

</head>

<body>
<?php
        include 'includes/header.php';
    ?>
    <div class="background"></div>
	<div class="container">
	<div class="title">Manage Contact Us Queries</div><br><hr><br>

        <table style="width: 98%;">
            <tr>
                <th style="width: 4%;">S.N.</th>
                <th style="width: 10%;">Name</th>
                <th style="width: 16%;">Email</th>
                <th style="width: 10%;">Contact No</th>
                <th style="width: 30%;">Message</th>
                <th style="width: 12.5%;">Posting date</th>
                <th style="width: 6%;">Status</th>
            </tr>

            <?php
            $sql = "SELECT * FROM tbl_msg";
            $result = mysqli_query($conn, $sql);
            $count=1;
            if (mysqli_num_rows($result) > 0) {
                while ($value = mysqli_fetch_assoc($result)) {
            ?>

            <tr>
                <td><?php echo htmlentities($count); ?></td>
                <td><?php echo $value['cname']; ?></td>
                <td><?php echo $value['email']; ?></td>
                <td><?php echo $value['phone']; ?></td>
                <td><?php echo $value['message']; ?></td>
                <td><?php echo $value['PostingDate']; ?></td>
                <td>
                    <?php
                    if($value['status'] == 'Pending')
                    {
                    ?>
                        <a href="readmsg.php?customer_id=<?php echo $value['customer_id'];?>" onclick="confirmAction()"> 
                        <button class="pending"><?php echo $value['status'];?></button></a>
                        <?php
                    }
                    else
                    {
                        ?><button class="completed"><?php
                     echo $value['status'];?></button><?php
                    } 
                    ?>
                </td>
                
                <?php
                $count=$count+1; }
                }
                ?>
            </tr>      
        </table>
        
	</div>
</body>
</html>