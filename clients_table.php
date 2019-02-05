<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <meta charset="UTF-8">
  <title>Title</title>
</head>
<body>
<div class="container">
  <div class="row">
    <table class="table table-dark">
      <thead>
      <tr>
        <th scope="col">amount</th>
        <th scope="col">name</th>
        <th scope="col">price</th>
      </tr>
      </thead>
        <?php foreach ($clients as $client): ?>
          <tr>
            <td><?php echo $client['orders_amount']; ?></td>
            <td><?php echo $client['name']; ?></td>
            <td><?php echo $client['max_price']; ?></td>
          </tr>
        <?php endforeach; ?>
    </table>
  </div>
</div>
</body>
</html>
