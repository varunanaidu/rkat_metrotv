<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-wrapper-before">
    </div>
    <div class="content-header row">
    </div>
    <section class="content-body">
      <!-- Chart -->
      <div class="row match-height">
        <div class="col-12">
          <div class="white">
            <h1> Strategic Planning Playbook </h1><br/>
          </div>
        </div>
      </div>
      <!-- Chart -->
      <div class="row clearfix" style="justify-content: center;">
        <div class="col-xl-6 col-lg-6 col-md-6">
          <div class="card">
            <form id="login-form" method="POST">
              <div class="card-header">
                <h1 class="card-title">Sign In</h1>
              </div>
              <div class="card-body">
                <div class="form-group col-md-12">
                  <label for="user_name">Username</label>
                  <input type="text" class="form-control" name="user_name" id="user_name" required="">
                </div>
                <div class="form-group col-md-12">
                  <label for="user_pass">Password</label>
                  <input type="password" class="form-control" name="user_pass" id="user_pass" required="">
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" id="btn-submit" class="btn btn-primary">Sign In</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>