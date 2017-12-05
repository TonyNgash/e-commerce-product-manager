<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $thisCategoryName; ?></title>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/styles.css">
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand navbar-link" href="#">FlamingoImpex Product Manager</a>
                    <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav">
                        <li class="active" role="presentation"><a href="<?php echo site_url();?>/mycontroller/furniture">Furniture </a></li>
                        <li role="presentation"><a href="<?php echo site_url();?>/mycontroller/aquariums">Aquariums </a></li>
                        <li role="presentation"><a href="<?php echo site_url();?>/mycontroller/pumps">Swimming Pool Accessories </a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h3 class="panel-title">All CATEGORIES</h3><a href="<?php echo site_url(); ?>/mycontroller/categories/" >MANAGE CATEGORIES</a>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <ul class="list-group">
                                <?php foreach($categories as $row): ?>
                                <li class="list-group-item"><a href="<?php echo site_url(); ?>/mycontroller/category/<?php echo $row->cat_name; ?>"><?php echo $row->cat_name; ?></a><span class="badge btn-primary">0</span></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title">Add a product to <?php echo $thisCategoryName; ?> category</h3>
                </div>
                    <div class="panel-body">
                        <div class="col-md-12">
                        <form action="../productAdder" method="post" >
                            <div class="col-md-5">
                                <div class="form-group">
                                    <input type="file" id="file_name" name="file_name">
                                </div>
                                <div class="thumbnail">
                                    <img id="previewHolder" src="<?php echo base_url(); ?>assets/img/image_placeholder.png">
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label for="prod_name">Product Name</label>
                                    <input type="text" name="prod_name" class="form-control" id="prod_name" /> 
                                </div>
                                <div class="form-group">
                                    <label for="prod_price">Price</label>
                                    <input type="text" name="prod_price" class="form-control" id="prod_price"  /> 
                                </div>
                                <div class="form-group">
                                    <label for="prod_quantity">Quantity</label>
                                    <input type="number" name="prod_quantity" class="form-control" id="prod_quantity" /> 
                                </div>
                                <div class="form-group">
                                    <label for="prod_desc">Description</label>
                                    <textarea type="text" name="prod_desc" class="form-control" id="prod_desc"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name='table_name' class="form-control" id="table_name" value="<?php echo $thisCategoryName; ?>" >
                                    <input type=submit class="btn btn-warning" value="Upload"/>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?php echo $thisCategoryName; ?></h3>
                    </div>
                    <div class="panel-body">
                        <?php  $counter = 1;  foreach($thisCategory as $row): ?>
                        <div class="col-md-12">
                            <div class="col-md-1">
                                <h1><?php echo $counter; $counter++;  ?> .</h1>
                            </div>
                            <div class="col-md-4">
                                <div class="thumbnail"><img src="<?php echo base_url();?>assets/img/<?php echo $row->file_name; ?>">
                                    <div class="caption">
                                        <h3><?php echo $row->product_name; ?></h3>
                                        <h5 style="color:red;">PRICE: <?php echo $row->product_price; ?> AED</h5>
                                        <p><?php echo $row->product_description; ?></p>
                                        <bold><h6>Created: <?php echo $row->created_on;  ?> </h6></bold>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <form action="../productUpdater" method="post">
                                    <div class="form-group">
                                        <label for="prod_name">Product Name</label>
                                        <input type="text" name="prod_name" class="form-control" value="<?php echo $row->product_name; ?>" /> 
                                    </div>
                                    <div class="form-group">
                                        <label for="prod_price">Price</label>
                                        <input type="text" name="prod_price" class="form-control" value="<?php echo $row->product_price; ?>" /> 
                                    </div>
                                    <div class="form-group">
                                        <label for="prod_quantity">Quantity</label>
                                        <input type="number" name="prod_quantity" class="form-control" value="<?php //echo $row->quantity; ?>" /> 
                                    </div>
                                    <div class="form-group">
                                        <label for="prod_desc">Description</label>
                                        <textarea type="text" name="prod_desc" class="form-control"><?php echo $row->product_description; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="product_id" id="product_id" value="<?php echo $row->table_id; ?>" />
                                        <input type="hidden" name="table_name" id="table_name" value="<?php echo $thisCategoryName; ?>" />
                                        <input type="submit" class="btn btn-primary" value="Update This Product"/>
                                    </div>
                                </form>
                                <form action="../productRemover" method="post">
                                    <input type="hidden" name="product_id" id="product_id" value="<?php echo $row->table_id; ?>" />
                                    <input type="hidden" name="table_name" id="table_name" value="<?php echo $thisCategoryName; ?>" />
                                    <input type="submit" class="btn btn-danger" value="Delete This Product"/>
                                </form>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/preview_image.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/prevent_enter_key.js"></script>
</body>
</html>
