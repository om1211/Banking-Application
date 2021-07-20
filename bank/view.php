<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Customers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  </head>
  <body>
    <?php include 'panel.php'; ?>
    <div class="vmain">
      <h2 class="vheading" >Customers Infomation</h2>
      <table>
        <thead>
          <tr>
            <th>Name</th>
            <th>Number</th>
            <th>Email</th>
            <th>Balance</th>
            <th></th>
          </tr>
          <tbody>
            <?php
            include 'connection.php';
            $selectquery="select * from `customer`";
            $query=mysqli_query($conn,$selectquery);
            while($res=mysqli_fetch_array($query))
            {?>
              <tr>
                <td><?php echo $res['name']; ?></td>
                <td><?php echo $res['number']; ?></td>
                <td><?php echo $res['email']; ?></td>
                <td><?php echo $res['balance']; ?></td>
                <td><a href="transfer.php?id=<?php echo $res['id']; ?>"><i class="bi bi-file-person"></i></td>
              </tr>
              <?php
            }
             ?>
          </tbody>
        </thead>
      </table>
    </div>
  </body>
</html>
