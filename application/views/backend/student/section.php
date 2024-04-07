<hr />
<br><br><br>

<div class="row">
	<div class="col-md-12">
	
		<div class="tabs-vertical-env">
		
			<ul class="nav tabs-vertical">
			<?php 
				$classes = $this->db->get('class')->result_array();
				foreach ($classes as $row):
			?>
				<li class="<?php if ($row['class_id'] == $class_id) echo 'active';?>">
					<a href="<?php echo base_url();?>index.php?student/section/<?php echo $row['class_id'];?>">
						<i class="entypo-dot"></i>
						<?php echo ('Class');?> <?php echo $row['name'];?>
					</a>
				</li>
			<?php endforeach;?>
			</ul>
			
			<div class="tab-content">

				<div class="tab-pane active">
					<table class="table table-bordered table-hover table-striped responsive">
						<thead>
							<tr>
								<th>#</th>
								<th><?php echo ('Section Name');?></th>
								<th><?php echo ('Nick Name');?></th>
								<th><?php echo ('Teacher');?></th>
							</tr>
						</thead>
						<tbody>

						<?php
							$count    = 1;
							$sections = $this->db->get_where('section' , array(
								'class_id' => $class_id
							))->result_array();
							foreach ($sections as $row):
						?>
							<tr>
								<td><?php echo $count++;?></td>
								<td><?php echo $row['name'];?></td>
								<td><?php echo $row['nick_name'];?></td>
								<td>
									<?php if ($row['teacher_id'] != '')
											echo $this->db->get_where('teacher' , array('teacher_id' => $row['teacher_id']))->row()->name;
										?>
								</td>
							</tr>
						<?php endforeach;?>
							
						</tbody>
					</table>
				</div>

			</div>
			
		</div>	
	
	</div>
</div>