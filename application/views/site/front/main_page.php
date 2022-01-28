<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-wrapper-before"></div>
    <div class="content-header row">
    </div>
    <section class="content-body">
      <br/><br/>
      <div class="row match-height">
        <div class="col-12">
          <div class="chart">
            <canvas id="chart-bar" class="chart-canvas"></canvas>
          </div>
        </div>
      </div><br/>
      <div class="row">
        <?php 
        if ( isset($data_level1) and $data_level1 != 0 ) {
          $i = 1;
          foreach ($data_level1 as $level1) {
           ?>
           <span class="collapse" id="level1_id"><?= $level1->level1_id ?></span>
           <div class="col-xl-4 col-lg-6 col-md-12">
            <a href="<?= base_url(); ?>site/details?l=1&i=<?= $level1->level1_id ?>">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-9">
                      <h1 class="card-title"><?= $level1->action_plan_name ?></h1>
                    </div>
                    <div class="col-md-3">
                      <h6 class="card-subtitle text-muted"><?= date('d F Y', strtotime($level1->action_plan_goal)) ?></h6>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart">
                    <canvas id="chart-doughnut-<?= $level1->level1_id ?>" class="chart-canvas"></canvas>
                  </div>
                </div>
              </div>
            </a>
          </div>
          <?php 
          $i++;
        }
      }
      ?>
    </div>

  </section>
</div>
</div>