<?php
function getData($selection){
    $item = '';
    $conn= new mysqli("localhost","root","","light");
    //$conn= new mysqli("den1.mysql4.gear.host","lightke","Ad177J~i74Y!","lightke");
    $sql = "SELECT * FROM products WHERE type='$selection'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $name = $row['name'];
            $price = $row['price'];
            //$description = $row['description'];
            //$availability = $row['availability'];
            $image = $row['image'];
            //$type = $row['type'];
            if ($image == null) {
                $image = "data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22318%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20318%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_158bd1d28ef%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A16pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_158bd1d28ef%22%3E%3Crect%20width%3D%22318%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22129.359375%22%20y%3D%2297.35%22%3EImage%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E";
            } else {
                $image = './assets/img/' . $image;
            }
            $item .= '<div class="col-md-4">
			<div class="card mb-3">
  <div class="card-body">
    <h5 class="card-title">' . $name . '</h5>
    <h6 class="card-subtitle text-primary">Ksh. ' . $price . '</h6>
  </div>
  <img style="height: 200px; width: 100%; display: block;" src="' . $image . '" alt="Card image">
  <div class="card-body">
    <a href="productSpecific.php?item=' . $row['id'] . '" class="card-link">View Details</a>
    <a href="#" class="card-link"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
  </div>
		</div>
	</div>';
        }
    } else {
        echo "<script>document.getElementById('".$selection."').innerHTML='';</script>";
    }
    echo $item;
}
?>