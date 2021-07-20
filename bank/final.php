<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=content-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>Transact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  </head>
  <body style="background-color: #f0fbff;height: 1000px;">
    <?php include 'panel.php'; ?>
    <h2 class="vheading">TRANSACTION HISTORY</h2>
    <table class="ttable">
      <tr>
        <th>Sender</th>
        <th>Receiver</th>
        <th>Amount</th>
      </tr>
      <?php
      include 'connection.php';
      $q="select * from transfer";
      $sq=mysqli_query($conn,$q);
      while($res=mysqli_fetch_array($sq)){?>
        <tr>
          <td><?php echo $res['sender']; ?></td>
          <td><?php echo $res['receiver']; ?></td>
          <td><?php echo $res['amount']; ?></td>
        </tr>
      <?php } ?>
    </table>
    <center class="btn-1">
       <a href="view.php"><button type="button" class="btn btn-lg btn-dark" name="button">View Customers</button></a>
    </center>
  </body>
</html>
