<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>User Feedback List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
        <th>No</th>
		<th>Name</th>
		<th>Advisory</th>
		<th>Region</th>
		
            </tr><?php
            foreach ($user_feedback_data as $user_feedback)
            {
			$reg = $this->db->get_where('region',array('id'=>$user_feedback->region));
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
			  <td><?php echo $user_feedback->names ?></td>
			  <td><?php echo $user_feedback->advisory ?></td>
			  <td><?php  foreach ($reg->result() as $p){ echo $p->name ; }?></td>
		      
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>