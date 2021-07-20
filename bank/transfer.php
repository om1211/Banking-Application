<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Tranfer</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  </head>
  <body>
    <?php include 'panel.php'; ?>
    <div class="subbody">
      <h2 class="vheading">Customer Information</h2>
            <?php
            include 'connection.php';
            $id=$_GET['id'];
            $squery="select * from customer where id=$id";
            $q=mysqli_query($conn,$squery);
            while($res=mysqli_fetch_array($q))
            {?>
              <table class="ttable" style="height:150px;">
              <tr>
                <th>Name</th>
                <th>Number</th>
                <th>Email</th>
                <th>Balance</th>
              </tr>
              <tr>
                <td><?php echo $res['name']; ?></td>
                <td><?php echo $res['number']; ?></td>
                <td><?php echo $res['email']; ?></td>
                <td><?php echo $res['balance']; ?></td>
              </tr>
              </table>
            <?php
          } ?>
      <h2 class="vheading">Transaction</h2>
      <form class="row gy-2 gx-3 align-items-center" action="" style="margin-left: 38%; margin-right:25%;" method="post">
        <div class="form" >
          <select class="form-select" placeholder="transfer to" name="rid">
            <option selected hidden disabled >TRANSFER TO</option>
            <?php
            include 'connection.php';
            $selectquery="select * from customer where id NOT LIKE $id";
            $query=mysqli_query($conn,$selectquery);
            while($res=mysqli_fetch_array($query)){?>
              <option name="rid" value="<?php echo $res['id']; ?>"><?php echo $res['name']; ?></option>
              <?php } ?>
          </select>
        </div>
        <div class="mb-3 row" >
          <label for="amount" class="col-sm-2 col-form-label" id="amount">Amount</label>
          <div class="col-sm-10">
            <input required type="text" placeholder="amount" name="tamount" id="amountbtn" class="form-control" style="margin-top:20px; width:300px;">
          </div>
        </div>
            <div class="button-container" >
          <button name="transfer" class="btn btn-lg btn-dark tbtn" style="padding-left:154px; padding-right:154px;">Transfer</button>
        </div>
      <?php
      include 'connection.php';
      if(isset($_POST['transfer']))
      {
        $from=$_GET['id'];
        $rid=$_POST['rid'];
        $tamount=$_POST['tamount'];

        $q1="select * from customer where id=$from";
        $query=mysqli_query($conn,$q1);
        $res1=mysqli_fetch_array($query);

        $q1="select * from customer where id=$rid";
        $query=mysqli_query($conn,$q1);
        $res2=mysqli_fetch_array($query);

        if(($tamount)>$res1['balance'])
        {
          echo '<script type="text/javascript">alert("Insufficient Balance")</script>';
        }
        else {
          $senderamnt=$res1['balance'];
          $recamnt=$res2['balance'];
          $snewamnt=$senderamnt-$tamount;
          $sq1="update customer set balance=$snewamnt where id=$from";
          mysqli_query($conn,$sq1);
          $rnewamnt=$recamnt+$tamount;
          $sq2="update customer set balance=$rnewamnt where id=$rid";
          mysqli_query($conn,$sq2);

          $sname=$res1['name'];
          $rname=$res2['name'];
          $sql = "INSERT INTO transfer(`sender`, `receiver`, `amount`) VALUES ('$sname', '$rname', '$tamount')";
          $squery=mysqli_query($conn,$sql);
          if($squery)
          {
            echo"<script> alert('Transaction Successful');
                           window.location='final.php';
                  </script>";
          }
        }
      }
       ?>
    </div>
    </form>
  </body>
</html>
