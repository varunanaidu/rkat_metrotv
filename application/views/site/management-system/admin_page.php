<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-wrapper-before">
    </div>
    <div class="content-header row">
    </div>
    <div class="content-body">
      <!-- Chart -->
      <div class="row match-height">
        <div class="col-12">
          <div class="white">
            <h1> Strategic Planning Playbook </h1><br/>
          </div>
        </div>
      </div>
      <!-- Chart -->
      <div class="row">
        <div class="col-xl-12 col-lg-6 col-md-12">
          <div class="card pull-up ecom-card-1 bg-white">
            <div class="card-header">
              <button type="button" class="btn btn-primary btn-min-width mr-1 mb-1 float-right btn-add-action"><i class="la la-plus"></i>Add Action Plan</button>
            </div>
            <div class="card-body">
              <div class="accordion" id="accordion">
                <?php 
                if ( isset($data_action) and $data_action != 0) {
                  for ($i=0; $i < sizeof($data_action); $i++) { 
                   ?>
                   <div class="card">
                   <div class="card-header" id="heading-<?= $data_action[$i]['level1_id'] ?>">
                     <h5 class="mb-0">
                      <a role="button" class="collapsed" data-toggle="collapse" href="#collapse-<?= $data_action[$i]['level1_id'] ?>" aria-expanded="false" aria-controls="collapse-<?= $data_action[$i]['level1_id'] ?>">
                        <?= ($i+1).'. '.$data_action[$i]['action_plan_name'] ?>
                      </a>
                    </h5>
                  </div>
                  <div id="collapse-<?= $data_action[$i]['level1_id'] ?>" class="collapse" aria-labelledby="heading-<?= $data_action[$i]['level1_id'] ?>" data-parent="#accordion">
                    <div class="card-body">
                      <div class="accordion" id="accordion-<?= $data_action[$i]['level1_id'] ?>">
                        <?php 
                        for ( $j = 0; $j < sizeof($data_action[$i]['level2']); $j++) { 
                         ?>
                         <div class="card-header" id="heading-<?= $data_action[$i]['level1_id'] ?>-<?= $data_action[$i]['level2'][$j]['level2_id'] ?>">
                           <h5 class="mb-0">
                            <a role="button" class="collapsed" data-toggle="collapse" href="#collapse-<?= $data_action[$i]['level1_id'] ?>-<?= $data_action[$i]['level2'][$j]['level2_id'] ?>" aria-expanded="false" aria-controls="collapse-<?= $data_action[$i]['level1_id'] ?>-<?= $data_action[$i]['level2'][$j]['level2_id'] ?>">
                              <?= ($j+1).'. '.$data_action[$i]['level2'][$j]['action_plan_name'] ?>
                            </a>
                          </h5>
                        </div>

                        <div id="collapse-<?= $data_action[$i]['level1_id'] ?>-<?= $data_action[$i]['level2'][$j]['level2_id'] ?>" class="collapse" aria-labelledby="heading-<?= $data_action[$i]['level1_id'] ?>-<?= $data_action[$i]['level2'][$j]['level2_id'] ?>" data-parent="#accordion-<?= $data_action[$i]['level1_id'] ?>">
                          <div class="card-body">
                            <div class="accordion" id="accordion-<?= $data_action[$i]['level1_id'] ?>-<?= $data_action[$i]['level2'][$j]['level2_id'] ?>">
                              <?php 
                              for ( $k = 0; $k < sizeof($data_action[$i]['level2'][$j]['level3']); $k++) { 
                               ?>
                               <div class="card-header" id="heading-<?= $data_action[$i]['level1_id'] ?>-<?= $data_action[$i]['level2'][$j]['level2_id'] ?>-<?= $data_action[$i]['level2'][$j]['level3'][$k]['level3_id'] ?>">
                                 <h5 class="mb-0">
                                   <a role="button" class="collapsed" data-toggle="collapse" href="#collapse-<?= $data_action[$i]['level1_id'] ?>-<?= $data_action[$i]['level2'][$j]['level2_id'] ?>-<?= $data_action[$i]['level2'][$j]['level3'][$k]['level3_id'] ?>" aria-expanded="false" aria-controls="collapse-<?= $data_action[$i]['level1_id'] ?>-<?= $data_action[$i]['level2'][$j]['level2_id'] ?>-<?= $data_action[$i]['level2'][$j]['level3'][$k]['level3_id'] ?>">
                                     <?= ($k+1).'. '.$data_action[$i]['level2'][$j]['level3'][$k]['action_plan_name'] ?>
                                   </a>
                                 </h5>
                               </div>

                               <div id="collapse-<?= $data_action[$i]['level1_id'] ?>-<?= $data_action[$i]['level2'][$j]['level2_id'] ?>-<?= $data_action[$i]['level2'][$j]['level3'][$k]['level3_id'] ?>" class="collapse" aria-labelledby="heading-<?= $data_action[$i]['level1_id'] ?>-<?= $data_action[$i]['level2'][$j]['level2_id'] ?>-<?= $data_action[$i]['level2'][$j]['level3'][$k]['level3_id'] ?>" data-parent="#accordion-<?= $data_action[$i]['level2'][$j]['level2_id'] ?>">
                                 <div class="card-body">
                                   <div class="accordion" id="accordion-<?= $data_action[$i]['level1_id'] ?>-<?= $data_action[$i]['level2'][$j]['level2_id'] ?>-<?= $data_action[$i]['level2'][$j]['level3'][$k]['level3_id'] ?>">
                                    <?php 
                                    for ( $l = 0; $l < sizeof($data_action[$i]['level2'][$j]['level3'][$k]['level4']); $l++) { 
                                     ?>
                                     <!-- <div class="card"> -->
                                       <div class="card-header" id="heading-<?= $data_action[$i]['level1_id'] ?>-<?= $data_action[$i]['level2'][$j]['level2_id'] ?>-<?= $data_action[$i]['level2'][$j]['level3'][$k]['level3_id'] ?>-<?= $data_action[$i]['level2'][$j]['level3'][$k]['level4'][$l]['level4_id'] ?>">
                                         <h5 class="mb-0">
                                           <a role="button" class="collapsed" data-toggle="collapse" aria-expanded="false" href="#collapse-<?= $data_action[$i]['level1_id'] ?>-<?= $data_action[$i]['level2'][$j]['level2_id'] ?>-<?= $data_action[$i]['level2'][$j]['level3'][$k]['level3_id'] ?>-<?= $data_action[$i]['level2'][$j]['level3'][$k]['level4'][$l]['level4_id'] ?>" aria-controls="collapse-<?= $data_action[$i]['level1_id'] ?>-<?= $data_action[$i]['level2'][$j]['level2_id'] ?>-<?= $data_action[$i]['level2'][$j]['level3'][$k]['level3_id'] ?>-<?= $data_action[$i]['level2'][$j]['level3'][$k]['level4'][$l]['level4_id'] ?>">
                                            <?= ($l+1).'. '.$data_action[$i]['level2'][$j]['level3'][$k]['level4'][$l]['action_plan_name'] ?>
                                          </a>
                                        </h5>
                                      </div>

                                      <div id="collapse-<?= $data_action[$i]['level1_id'] ?>-<?= $data_action[$i]['level2'][$j]['level2_id'] ?>-<?= $data_action[$i]['level2'][$j]['level3'][$k]['level3_id'] ?>-<?= $data_action[$i]['level2'][$j]['level3'][$k]['level4'][$l]['level4_id'] ?>" class="collapse" aria-labelledby="heading-<?= $data_action[$i]['level1_id'] ?>-<?= $data_action[$i]['level2'][$j]['level2_id'] ?>-<?= $data_action[$i]['level2'][$j]['level3'][$k]['level3_id'] ?>-<?= $data_action[$i]['level2'][$j]['level3'][$k]['level4'][$l]['level4_id'] ?>" data-parent="#accordion-<?= $data_action[$i]['level1_id'] ?>-<?= $data_action[$i]['level2'][$j]['level2_id'] ?>-<?= $data_action[$i]['level2'][$j]['level3'][$k]['level3_id'] ?>">
                                        <div class="card-body">
                                          <?php 
                                          for ( $m = 0; $m < sizeof($data_action[$i]['level2'][$j]['level3'][$k]['level4'][$l]['level5']); $m++) { 
                                            echo ($m+1).'. '.$data_action[$i]['level2'][$j]['level3'][$k]['level4'][$l]['level5'][$m]['action_plan_name'];
                                          }
                                          ?>
                                        </div>
                                      </div>
                                    <!-- </div> -->
                                    <?php 
                                  }
                                  ?>
                                </div>
                              </div>
                            </div>

                            <?php 
                          }
                          ?>
                        </div>
                      </div>
                    </div>

                    <?php 
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>
            <?php 
          }
        }
        ?>
      </div>
    </div>
  </div>
</div>
</div>
</div>

<div class="modal fade" id="default-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="POST" id="action-plan-form" accept-charset="UTF-8">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row clearfix">
            <div class="form-group col-md-12">
              <label for="level">Level </label>
              <select class="form-control" id="level" name="level" required="">
                <option value="">-</option>
                <option value="1">Primary</option>
                <option value="2">Directorate</option>
                <option value="3">Division</option>
                <option value="4">Department</option>
                <option value="5">Description</option>
              </select>
            </div>
            <div class="form-group col-md-12">
              <label for="level_name">Level Name </label>
              <select class="form-control" id="level_name" name="level_name">
                <option value="">-</option>
              </select>
            </div>
            <div class="form-group col-md-12">
              <label for="parent_plan">Parent Plan </label>
              <select class="form-control" id="parent_plan" name="parent_plan">
                <option value="">-</option>
              </select>
            </div>
            <div class="form-group col-md-12">
              <label for="action_plan_goal"> Goal</label>
              <input type="date" name="action_plan_goal" id="action_plan_goal" class="form-control" value="<?= date('Y-m-d') ?>" required="">
            </div>
            <div class="form-group col-md-12">
              <label for="action_plan_name"> Action Plan</label>
              <input type="text" name="action_plan_name" id="action_plan_name" class="form-control" value="" placeholder="..." required="">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <input type="text" class="collapse" name="id" id="id" value="">
          <button type="submit" id="btn-submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
</div>
</div>