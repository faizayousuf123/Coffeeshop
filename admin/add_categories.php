<?php
session_start();
include('../config.php');
include('../includes/header.php');
include('../includes/sidebar.php');
include('../includes/footer.php');
?>

<div class="container">
    <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Add categories</h4>
                </div>
                <div class="card-body">
                   <form action="manage_category.php" method="POST"enctype="multipart/form-data">
                   <div class="col mb-3">
                           <div class="col-md-12">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Your Name">
                           </div>
                           <div class="col mb-3">
                           <div class="col-md-12">
                            <label for="slug" class="form-label">slug</label>
                            <input type="text" name="slug" class="form-control" placeholder="Enter Your slug">
                           </div>
                           <div class="col mb-3">
                           <div class="col-md-12">
                            <label for="">Description</label>
                            <input type="text" class="form-control"name="description">
                           </div>
                           <div class="col mb-3">
                           <div class="col-md-12">
                            <label for=""> upload image</label>
                            <input type="file" name="image"class="form-control" >
                           </div>
                           
                           <div class="col mb-3">
                           <div class="col-md-12">
                            <label for="">meta_title</label>
                            <input type="text" class="form-control" name="meta_title">
                           </div>
                           <div class="col mb-3">
                           <div class="col-md-12">
                            <label for="">meta_description</label>
                            <textarea rows="3" class="form-control" name="meta_description"></textarea>
                           </div>
                           <div class="col mb-3">
                           <div class="col-md-12">
                            <label for="">meta_key</label>
                            <textarea rows="3" class="form-control"name="meta_key" placeholder="Enter Your meta_key"></textarea>
                           </div>
                           <div class="col mb-3">
                           <div class="mt-12">
                           <label >status</label>
                           <input type="hidden" name="status" value="1">
                           <input type="checkbox" name="status">
                           </div>
                           <div class="col mb-3">
                           <div class="mt-12">
                           <label >trending</label>
                           <input type="hidden" name="trending" value="0">
                           <input type="checkbox" name="trending">
                           </div>
                           <div class="col mb-3">
                           <div class="col-md-12">
                           <button type="submit" class="btn btn-primary" name="add_categories">Save</button>
                           </div>
                           </form>
                        </div>
                    </div>
                </div></div>
            </div>
        

   


