<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Styles/home.css">
    <style>
        .dU_bar ul {
            list-style: none;
          
            display: flex;
            flex-wrap: wrap;
        }
        
        .dU_bar li {
            padding-left: 18px;
          
            display: inline-block;
            width: 11%; /* Adjust this value to control the number of columns */
            box-sizing: border-box;
            
        }
        .dU_bar{
            background-color: #00e226;
            color: white;
          
            }
        .menu_bar_text{
            color: white;
            cursor: pointer;
            text-decoration: none;
            font-size: 25px;
            }
            .menu-text-btn{
                font-size: 22px;
                text-decoration: none;
                padding-left: 50px;
                padding-right: 50px;
                padding-top: 7.5px;
                padding-bottom: 5px;
                
            }
            .menu-text-btn:hover{
                background-color: #005f05;
            }
    </style>
</head>
<body>
<div class="dU_bar">
	<ul class="">
		<?php
		$sql = mysqli_query($con, "SELECT id, categoryName FROM category LIMIT 6");
		while ($row = mysqli_fetch_array($sql)) {
		?>
		<li class="menu_bar_text">
			<a class="menu-text-btn" style="color: white;" href="category.php?cid=<?php echo $row['id']; ?>"><?php echo $row['categoryName']; ?></a>
		</li>
		<?php
		}
		?>
	</ul><!-- /.navbar-nav -->
	
</div>
</body>
</html>

				

