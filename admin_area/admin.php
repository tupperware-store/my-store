<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Page</title>
    <link href="style.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="icon" href="img/icon.png" type="image/x-icon" />
</head>
<body id="admin-body">
    <section id="header">
        <a href=""><img src="img/logo.png" class="logo" alt="" /></a>
        <div id="sec">
                    <div class="mobile-1">
                        <i id= 'arrow' class="fa fa-bars" aria-hidden="true"></i>
                    </div>
                </div>
    </section>
    
    <section class="header1">
                    <h1 class="head-dash">ADMINISTRATION DASHBOARD</h1>
                </section>

    <section id="dashboard">
        <div class="row">
            <div class="panel1">
                <ul id="pan">
                    <li class="head-panel">Administrative Panel</li>
                    <li class="sub"><a href="admin.php?all-orders">All Orders</a></li>
                    <li class="sub"><a href="../admin-register.php">Create New Admin</a> </li>
                    <li class="sub"><a href="../register.php">Create New User</a> </li>
                    <li class="sub"><a href="admin.php?insert-main-category">Insert Main Category</a> </li>
                    <li class="sub"><a href="admin.php?insert-category">Insert Category</a> </li>
                    <li class="sub"><a href="admin.php?insert-product">Insert Products</a></li>
                    <li class="sub"><a href="admin.php?insert-variety">Insert Variety</a></li>
                    <li class="sub"><a href="admin.php?inventory">Inventory</a></li>
                    <li class="sub"><a href="admin.php?list_of_users">List of Users</a> </li>
                    <li class="sub"><a href="admin.php?list_of_variety">List of Variety</a> </li>
                    <li class="sub"><a href="admin.php?view-categories">View Categories</a></li>
                    <li class="sub"><a href="admin.php?view_products">View Products</a></li>
                    <li class="sub"><a href="../admin_area/admin_login.php">Logout</a> </li>
                    <a href="#" id="close1"><i class="fa fa-times"></i></a>
                </ul>
                
            </div>
            <div class="panel2">
                
                <div id="sec">
                    <?php 
                    if(isset($_GET['insert-main-category'])){
                        include('main_categories.php');
                    }
                    if(isset($_GET['insert-category'])){
                        include('insert-categories.php');
                    }
                    if(isset($_GET['insert-product'])){
                        include('insert-product.php');
                    }
                    if(isset($_GET['view_products'])){
                        include('view_products.php');
                    }
                    if(isset($_GET['edit_products'])){
                        include('edit_products.php');
                    }
                    if(isset($_GET['delete_product'])){
                        include('delete_products.php');
                    }
                    if(isset($_GET['view-categories'])){
                        include('view_cat.php');
                    }
                    if(isset($_GET['delete_category'])){
                        include('delete_cat.php');
                    }
                    if(isset($_GET['edit_category'])){
                        include('edit_cat.php');
                    }
                    if(isset($_GET['list_of_users'])){
                        include('list_of_users.php');
                    }
                    if(isset($_GET['delete_user'])){
                        include('delete_user.php');
                    }
                    if(isset($_GET['insert-variety'])){
                        include('variety.php');
                    }
                    if(isset($_GET['all-orders'])){
                        include('all-orders.php');
                    }
                    if(isset($_GET['inventory'])){
                        include('inventory.php');
                    }
                    if(isset($_GET['list_of_variety'])){
                        echo "<h1 style='display: flex; justify-content: center; font-weight: 900;'>LIST OF VARIETIES</h1>";
                        include('list-variety.php');
                    }

                ?>
                </div>
            </div>
        </div>
        
    </section>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="script.js"></script>
    <script>
        history.pushState(null, null, location.href);
        window.onpopstate = function () {
            history.go(1);
        };
</script>
</body>
</html>