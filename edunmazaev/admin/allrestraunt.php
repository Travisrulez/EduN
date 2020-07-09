<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Админка</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body class="fix-header fix-sidebar">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <div id="main-wrapper">
    <div class="left-sidebar">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                   <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">Главная</li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Панель управления</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="dashboard.php">Панель управления</a></li>
                                
                            </ul>
                        </li>
                        <li class="nav-label">Управление</li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false">  <span><i class="fa fa-user f-s-20 "></i></span><span class="hide-menu">Пользователи</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="allusers.php">Все пользователи</a></li>
								<li><a href="add_users.php">Добавить пользователя</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-archive f-s-20 color-warning"></i><span class="hide-menu">Рестораны</span></a>
                            <ul aria-expanded="false" class="collapse">
								<li><a href="allrestraunt.php">Все рестораны</a></li>
								<li><a href="add_category.php">Добавить категорию</a></li>
                                <li><a href="add_restraunt.php">Добавить ресторан</a></li>
                            </ul>
                        </li>
                     <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-cutlery" aria-hidden="true"></i><span class="hide-menu">Меню</span></a>
                            <ul aria-expanded="false" class="collapse">
								<li><a href="all_menu.php">Все меню</a></li>
								<li><a href="add_menu.php">Добавить меню</a></li>
                            </ul>
                        </li>
						 <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="hide-menu">Заказы</span></a>
                            <ul aria-expanded="false" class="collapse">
								<li><a href="all_orders.php">Все заказы</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="page-wrapper">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Панель управления</h3> </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
						     <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Все рестораны</h4>
                                <h6 class="card-subtitle">Экспортиравть информацию в Copy, CSV, Excel, PDF & Print</h6>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
											 <th>Категория</th>
                                                <th>Название</th>
                                                <th>Email</th>
                                                <th>Телефон</th>
                                                <th>Сайт</th>
                                                <th>Часы открытия</th>
                                                <th>Часы закрытия</th>
												<th>Дни работы</th>
												  <th>Адрес</th>
												  <th>Картинка</th>
												  <th>Дата</th>
												   <th>Действия</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                            <th>Категория</th>
                                                <th>Название</th>
                                                <th>Email</th>
                                                <th>Телефон</th>
                                                <th>Сайт</th>
                                                <th>Часы открытия</th>
                                                <th>Часы закрытия</th>
												<th>Дни работы</th>
												  <th>Адрес</th>
												  <th>Картинка</th>
												  <th>Дата</th>
												   <th>Действия</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                               	<?php
												$sql="SELECT * FROM restaurant order by rs_id desc";
												$query=mysqli_query($db,$sql);
												
													if(!mysqli_num_rows($query) > 0 )
														{
															echo '<td colspan="11"><center>Нет ресторанов</center></td>';
														}
													else
														{				
																	while($rows=mysqli_fetch_array($query))
																		{
																				$mql="SELECT * FROM res_category where c_id='".$rows['c_id']."'";
																					$res=mysqli_query($db,$mql);
																					$row=mysqli_fetch_array($res);
																					echo ' <tr><td>'.$row['c_name'].'</td>
																								<td>'.$rows['title'].'</td>
																								<td>'.$rows['email'].'</td>
																								<td>'.$rows['phone'].'</td>
																								<td>'.$rows['url'].'</td>
																								<td>'.$rows['o_hr'].'</td>
																								<td>'.$rows['c_hr'].'</td>
																								<td>'.$rows['o_days'].'</td>
																								<td>'.$rows['address'].'</td>
																								<td><div class="col-md-3 col-lg-8 m-b-10">
																								<center><img src="Res_img/'.$rows['image'].'" class="img-responsive radius"  style="min-width:150px;min-height:100px;"/></center>
																								</div></td>
																								<td>'.$rows['date'].'</td>
																									 <td><a href="delete_stores.php?res_del='.$rows['rs_id'].'" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-trash-o" style="font-size:16px"></i></a> 
																									 <a href="update_restraunt.php?res_upd='.$rows['rs_id'].'" class="btn btn-info btn-flat btn-addon btn-sm m-b-10 m-l-5"><i class="ti-settings"></i></a>
																									</td></tr>';			
																		}	
														}
											?>               
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
						 </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/lib/datatables/datatables.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="js/lib/datatables/datatables-init.js"></script>
</body>
</html>