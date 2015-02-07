<div class="index">
    
     

     <table  border=1>
    <tr>
        <th >Username</th>
        <th >Email</th>
        <th >Nickname</th>
        
        
    </tr>   
    <?php foreach ($user_tbl as $user): ?>
    <tr>  
        <td >
            <?php echo $this->Html->link($user['User']['username'],array('controller' => 'Getuser', 'action' => 'getUser', $user['User']['user_id'])); ?>
        </td>
        <td><?php echo h($user['User']['email_add']); ?></td>
        <td><?php echo h($user['User']['nickname']); ?></td>
       
         
    </tr>
    <?php endforeach; ?>
    <?php unset($user); ?>
    
</table>
    <?php echo $this->Html->link('Insert User',array('controller' => 'Insert', 'action' => 'insertUser')); ?>
</div>