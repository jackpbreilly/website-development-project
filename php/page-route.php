<?php

    // Checks to see what user wants to view. Admin view/ Fan website
    if(isset($_GET["admin"])){

        // If Logged in.
        if (isset( $_SESSION['adminId'] )) {
            include("admin/admin-nav.php");
            $adminPage = getURLParameters("admin");
            // Shows functionality based on navbar selections.
            switch ($adminPage) {
                case "tour":
                    include("admin/tour-date.php");
                    break;
                case "blog":
                    include("admin/blog-post.php");
                    break;
                case "store":
                    include("admin/product.php");
                    break;
                case "mail":
                    include("admin/read-fan-mail.php");
                    break;
                case "newAdmin":
                    include("admin/admin.php");
                    break;
                case "logout":
                    logoutAdmin();
                    break;
            }
        }
        elseif (!isset( $_SESSION['adminId'] )){
            include("admin/login-form.php");
        }
    }
    else{
        include("main_index/nav.php");
        if(!isset($_GET['articleId']) AND !isset($_GET['tourId']) AND !isset($_GET['articleId']) AND !isset($_GET['productId']) AND !isset($_GET['allTourDates']) AND !isset($_GET['allBlogPosts']) AND !isset($_GET['allProducts'])){
            include("main_index/header.php");
            include("tour/recent-tour-dates.php");
            include("blog/newest-blog-post.php");
            include("store/new-products.php");
            include("fan_mail/fan-mail.php");
        }
        if(isset($_GET["tourId"])){
            include("tour/specific-tour-date.php");
        }elseif(isset($_GET["articleId"])){
            include("blog/specific-blog-post.php");
            include("blog/comment.php");
        }elseif(isset($_GET["productId"])){
            include("store/specific-product.php");
        }elseif(isset($_GET["allProducts"])){
            include("store/all-products.php");
        }elseif(isset($_GET["allBlogPosts"])){
            include("blog/all-blog-posts.php");
        }elseif(isset($_GET["allTourDates"])){
            include("tour/all-tour-dates.php");
        }
    }
