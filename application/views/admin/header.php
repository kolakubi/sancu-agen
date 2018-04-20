<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/bootstrap/css/bootstrap.css">
    <!-- datatables css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/datatables/datatables.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/datatables/buttons/css/buttons.bootstrap.min.css">
    <title>Dashboard</title>
  </head>
  <body>

    <div class="container">
      <div class="row">
          <!-- menu -->
          <nav class="navbar navbar-default">

            <div class="container-fluid">
              <div class="navbar-header">
                <!-- menu mobile -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <!-- logo -->
                <a class="navbar-brand" href="<?php echo base_url() ?>admin">
                  <img alt="brand" src="<?php echo base_url() ?>asset/image/logo-sancu-new-2.png" style="max-width: 100px; margin-top: -10px;">
                </a>
              </div> <!-- end of nav-header -->

              <div class="collapse navbar-collapse">
                <ul class="nav nav-tabs">
                  <li><a href="<?php echo base_url() ?>admin/agen">Agen</a></li>
                  <li><a href="<?php echo base_url() ?>admin/pembelian">Pembelian</a></li>
                  <li><a href="#">Bonus</a></li>
                </ul>
              </div>

              <!-- button logout -->
              <a href="<?php echo base_url() ?>logout" class="btn btn-default navbar-btn navbar-right">Sign out</a>
            </div>

          </nav>
