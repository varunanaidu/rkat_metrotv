<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="app-content content">
	<div class="content-wrapper">
		<div class="content-wrapper-before"></div>
		<div class="content-header row">
		</div>
		<section class="content-body">
			<!-- Chart -->
			<div class="row match-height">
				<div class="col-12">
					<div class="white">
						<?php 
						if ( isset($level) ) {
							switch ($level) {
								case 'level_2':
								if ( isset($data_level_parent) and $data_level_parent != 0 ) {
									foreach ($data_level_parent as $level1) {
										?>
										<span class="collapse" id="level1_id"><?= $level1->level1_id ?></span>
										<h1> Strategic Planning Playbook </h1><br/>
										<h2> Strategi Korporat  &nbsp; : <?= $level1->action_plan_name ?> </h2><br/>
										<h2> Goal &nbsp; : <?= date('d F Y', strtotime($level1->action_plan_goal)) ?> </h2><br/>
										<h2> Status &nbsp; : <?= $level1->level1_progress ?>% </h2><br/>
										<div class="progress">
											<div class="progress-bar bg-gradient-warning" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: <?= $level1->level1_progress ?>%;"></div>
										</div>
										<?php 
									}
								}
								break;
								case 'level_3':
								if ( isset($data_level_parent) and $data_level_parent != 0 ) {
									foreach ($data_level_parent as $level2) {
										?>
										<span class="collapse" id="level2_id"><?= $level2->level2_id ?></span>
										<h1> Strategic Planning Playbook </h1><br/>
										<h2> Strategi Direktorat  &nbsp; : <?= $level2->action_plan_name ?> </h2><br/>
										<h2> Direktorat &nbsp; : <?= $level2->dir_name ?></h2>
										<h2> Goal &nbsp; : <?= date('d F Y', strtotime($level2->action_plan_goal)) ?> </h2><br/>
										<h2> Status &nbsp; : <?= $level2->level2_progress ?>% </h2><br/>
										<div class="progress">
											<div class="progress-bar bg-gradient-warning" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: <?= $level2->level2_progress ?>%;"></div>
										</div>
										<?php 
									}
								}
								break;
								case 'level_4':
								if ( isset($data_level_parent) and $data_level_parent != 0 ) {
									foreach ($data_level_parent as $level3) {
										?>
										<span class="collapse" id="level3_id"><?= $level3->level3_id ?></span>
										<h1> Strategic Planning Playbook </h1><br/>
										<h2> Strategi Divisi  &nbsp; : <?= $level3->action_plan_name ?> </h2><br/>
										<h2> Divisi &nbsp; : <?= $level3->div_name ?></h2>
										<h2> Goal &nbsp; : <?= date('d F Y', strtotime($level3->action_plan_goal)) ?> </h2><br/>
										<h2> Status &nbsp; : <?= $level3->level3_progress ?>% </h2><br/>
										<div class="progress">
											<div class="progress-bar bg-gradient-warning" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: <?= $level3->level3_progress ?>%;"></div>
										</div>
										<?php 
									}
								}
								break;
								case 'level_5':
								if ( isset($data_level_parent) and $data_level_parent != 0 ) {
									foreach ($data_level_parent as $level4) {
										?>
										<span class="collapse" id="level4_id"><?= $level4->level4_id ?></span>
										<h1> Strategic Planning Playbook </h1><br/>
										<h2> Strategi Department  &nbsp; : <?= $level4->action_plan_name ?> </h2><br/>
										<h2> Department &nbsp; : <?= $level4->dept_name ?></h2>
										<h2> Goal &nbsp; : <?= date('d F Y', strtotime($level4->action_plan_goal)) ?> </h2><br/>
										<h2> Status &nbsp; : <?= $level4->level4_progress ?>% </h2><br/>
										<div class="progress">
											<div class="progress-bar bg-gradient-warning" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: <?= $level4->level4_progress ?>%;"></div>
										</div>
										<?php 
									}
								}
								break;
							}
						}
						?>
					</div>
				</div>
			</div>
			<!-- Chart -->
			<!-- eCommerce statistic -->
			<div class="row">
				<?php 
				if ( isset($level) ) {
					switch ($level) {
						case 'level_2':
						if ( isset($data_level_child) and $data_level_child != 0 ) {
							$i = 1;
							foreach ($data_level_child as $level2) {
								?>
								<div class="col-xl-4 col-lg-6 col-md-12">
									<a href="<?= base_url(); ?>site/details?l=2&i=<?= $level2->level2_id ?>">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col-md-9">
														<h1 class="card-title"><?= $level2->action_plan_name ?></h1>
														<h4 class="card-subtitle text-muted" style="color:blue !important;">Direktorat : <?= $level2->dir_name ?></h4>
													</div>
													<div class="col-md-3">
														<h6 class="card-subtitle text-muted text-right"><?= date('d F Y', strtotime($level2->action_plan_goal)) ?></h6>
													</div>
												</div>
											</div>
											<div class="card-body">
												<!-- <p class="card-text" style="color: red"><?= 'Notes : ' . $level2->level2_notes ?></p> -->
												<div class="col-md-12 chart">
													<canvas id="chart-doughnut-<?= $level2->level2_id ?>" class="chart-canvas"></canvas>
												</div>
											</div>
											<div class="card-footer">
												<?php 
												if ($level2->level2_progress < 100) {
													?>
													<div class="col-md-12 form-group">
														<button type="button" class="btn btn-primary btn-update" data-id="<?= $level2->level2_id ?>" data-id2="<?= $level1->level1_id ?>" data-level="2" style="float: right;">Update Progress</button>
													</div>
													<?php 
												}
												?>
												<span class="text-red" style="color: red">* Last Update : <?= date('d-M-Y H:i:s', strtotime($level2->edited_date)); ?></span>
											</div>
										</div>
									</a>
								</div>
								<?php 
								$i++;
							}
						}
						break;
						case 'level_3':
						if ( isset($data_level_child) and $data_level_child != 0 ) {
							$i = 1;
							foreach ($data_level_child as $level3) {
								?>
								<div class="col-xl-4 col-lg-6 col-md-12">
									<a href="<?= base_url(); ?>site/details?l=3&i=<?= $level3->level3_id ?>">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col-md-9">
														<h1 class="card-title"><?= $level3->action_plan_name ?></h1>
														<h4 class="card-subtitle text-muted" style="color:blue !important;">Divisi : <?= $level3->div_name ?></h4>
													</div>
													<div class="col-md-3">
														<h6 class="card-subtitle text-muted text-right"><?= date('d F Y', strtotime($level3->action_plan_goal)) ?></h6>
													</div>
												</div>
											</div>
											<div class="card-body">
												<!-- <p class="card-text" style="color: red"><?= 'Notes : ' . $level3->level3_notes ?></p> -->
												<div class="col-md-12 chart">
													<canvas id="chart-doughnut-<?= $level3->level3_id ?>" class="chart-canvas"></canvas>
												</div>
											</div>
											<div class="card-footer">
												<?php 
												if ($level3->level3_progress < 100) {
													?>
													<div class="col-md-12 form-group">
														<button type="button" class="btn btn-primary btn-update" data-id="<?= $level3->level3_id ?>" data-id2="<?= $level2->level2_id ?>" data-level="3" style="float: right;">Update Progress</button>
													</div>
													<?php 
												}
												?>
											</div>
										</div>
									</a>
								</div>
								<?php 
								$i++;
							}
						}
						break;
						case 'level_4':
						if ( isset($data_level_child) and $data_level_child != 0 ) {
							$i = 1;
							foreach ($data_level_child as $level4) {
								?>
								<div class="col-xl-4 col-lg-6 col-md-12">
									<a href="<?= base_url(); ?>site/details?l=4&i=<?= $level4->level4_id ?>">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col-md-9">
														<h1 class="card-title"><?= $level4->action_plan_name ?></h1>
														<h4 class="card-subtitle text-muted" style="color:blue !important;">Departemen : <?= $level4->dept_name ?></h4>
													</div>
													<div class="col-md-3">
														<h6 class="card-subtitle text-muted"><?= date('d F Y', strtotime($level4->action_plan_goal)) ?></h6>
													</div>
												</div>
											</div>
											<div class="card-body">
												<!-- <p class="card-text" style="color: red"><?= 'Notes : ' . $level4->level4_notes ?></p> -->
												<div class="col-md-12 chart">
													<canvas id="chart-doughnut-<?= $level4->level4_id ?>" class="chart-canvas"></canvas>
												</div>
											</div>
											<div class="card-footer">
												<?php 
												if ($level4->level4_progress < 100) {
													?>
													<div class="col-md-12 form-group">
														<button type="button" class="btn btn-primary btn-update" data-id="<?= $level4->level4_id ?>" data-id2="<?= $level3->level3_id ?>" data-level="4" style="float: right;">Update Progress</button>
													</div>
													<?php 
												}
												?>
											</div>
										</div>
									</a>
								</div>
								<?php 
								$i++;
							}
						}
						break;
						case 'level_5':
						if ( isset($data_level_child) and $data_level_child != 0 ) {
							$i = 1;
							foreach ($data_level_child as $level5) {
								?>
								<div class="col-xl-4 col-lg-6 col-md-12">
									<a href="javascript:void(0)">
										<div class="card">
											<div class="card-body">
												<h6 class="card-subtitle text-muted text-right"><?= date('d F Y', strtotime($level5->action_plan_goal)) ?></h6>
											</div>
											<div class="card-body">
												<p class="card-text" style="color: black"><?= $level5->action_plan_name ?></p>
												<p class="card-text" style="color: red"><?= 'Notes : ' . $level5->level5_notes ?></p>
												<div class="chart">
													<canvas id="chart-doughnut-<?= $level5->level5_id ?>" class="chart-canvas"></canvas>
												</div>
											</div>
											<div class="card-footer">
												<?php 
												if ($level5->level5_progress < 100) {
													?>
													<div class="col-md-12 form-group">
														<button type="button" class="btn btn-primary btn-update" data-id="<?= $level5->level5_id ?>" data-id2="<?= $level4->level4_id ?>" data-level="5" style="float: right;">Update Progress</button>
													</div>
													<?php 
												}
												?>
											</div>
										</div>
									</a>
								</div>
								<?php 
								$i++;
							}
						}
						break;
					}
				}
				?>
			</div>

			<div class="modal fade" id="default-modal" tabindex="-1" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<form method="POST" id="progress-form" accept-charset="UTF-8">
							<div class="modal-header">
								<h5 class="modal-title">Modal title</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">×</span>
								</button>
							</div>
							<div class="modal-body">
								<div class="row clearfix">
									<div class="form-group col-md-12">
										<label for="level_progress">Progress </label>
										<input type="number" class="form-control" id="level_progress" maxlength="100" name="level_progress" value="" placeholder="..." required>
									</div>
									<div class="form-group col-md-12">
										<label for="level_notes">Notes</label>
										<textarea class="form-control" id="level_notes" name="level_notes" value="" required=""></textarea>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<input type="text" class="collapse" name="id_parent" id="id_parent" value="">
								<input type="text" class="collapse" name="id_child" id="id_child" value="">
								<input type="text" class="collapse" name="level" id="level">
								<button type="submit" id="btn-submit" class="btn btn-primary">Save</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>