<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/bootstrap/css/bootstrap.min.css">
    <title>Dashboard</title>
  </head>
  <body>

    <div class="container-fluid">
      <div class="row" style="overflow-x: hidden">
        <div class="col-md-4 col-sm-12 col-xs-12" style="padding: 0px; height: 100vh">

          <!-- menu -->
          <nav class="navbar navbar-default">

            <div class="container-fluid">
              <div class="navbar-header">
                <a class="navbar-brand" href="<?php echo base_url() ?>agen">
                  <img alt="brand" src="<?php echo base_url() ?>asset/image/logo-sancu-new-2.png" style="max-width: 100px; margin-top: -10px;">
                </a>
              </div>
              <a href="<?php echo base_url() ?>logout" class="btn btn-default navbar-btn navbar-right" style="margin-right: 5px;">Sign out</a>
            </div>

          </nav>

          <!-- buat wrap konten -->
          <div class="row">
