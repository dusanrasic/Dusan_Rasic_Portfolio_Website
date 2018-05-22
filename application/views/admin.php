<?php
$ulog = $this->session->userdata('admin');
if (!isset($ulog) && $ulog==false)
{
   redirect('app');
}
?>
<section class="admin">
  <div class="admin_nav">
    <ul>
    <?php
    if (isset($navs)) {
      foreach ($navs as $nav) {
        echo "<li>".anchor($nav->link,$nav->title)."</li>";
      }
    }
     ?>
    </ul>
  </div>
  <div class="content">
  	<h1>Admin Panel</h1>
  	<h2>List of users</h2>
  	<form action="Admin/users" method="POST">
  	<table>
  		<thead>
  		<tr>
  				<th>User_id</th>
  				<th>User_name</th>
  				<th>Password</th>
  				<th>Email</th>
  				<th>Function</th>
  				<th colspan="2">Operation</th>
  			</tr>
  		</thead>
  		<tbody>
  	<?php
  			 if(isset($users)){
           foreach ($users as $user) {
  				       ?>
                    <tr>
  								    <td><input type='text' name='id' value='<?php echo $user->id_user;?>' class='inpText' readonly></td>
                      <td><input type='text' name='name' value='<?php echo $user->user_name;?>' class='inpText'></td>
  								    <td><input type='text' name='password' value='<?php echo $user->password;?>' class='inpText'></td>
  								    <td><input type='text' name='mail' value='<?php echo $user->email;?>' class='inpText'></td>
  								    <td><input type='text' name='fn' value='<?php echo $user->id_function;?>' class='inpText'></td>
  										<td><input type='submit' name='btnUserUpdate' value='UPDATE' class='btnDelete'></td>
                      <td><input type="submit" name="btnUserDelete" value="DELETE" class="btnDelete"></td>
  								  </tr>
  								<?php
  			           }
         }
  	 ?>
  	 <tr>
  		 <td colspan="2">
  			 <input type="text" name="nickname" placeholder="Type user_name" class="inpText">
  		 </td>
  		 <td>
  			 <input type="text" name="pass" placeholder="Type password" class="inpText">
  		 </td>
  		 <td colspan="2">
  			 <input type="text" name="email" placeholder="Type email" class="inpText">
  		 </td>
       <td>
  			 <input type="text" name="function" placeholder="1/2-admin/user" class="inpText">
  		 </td>
  		 <td>
  			 <input type="submit" name="btnUserAdd" value="ADD" class="btnDelete">
  		 </td>
  	 </tr>
  	 </tbody>
  	 </table>
   </form>
   <h2>Contact</h2>
   <form action="Admin/contact" method="POST">
   <table>
   	<thead>
   		<tr>
   			<th>Contact Id</th>
   			<th>Contact subject</th>
   			<th>Contact text</th>
   			<th>Contact user</th>
   			<th>Operation</th>
   		</tr>
   	</thead>
   	<tbody>
   	<tr>
   	<?php
      if(isset($contacts)){
        foreach ($contacts as $contact) {
          ?>
                <tr>
   		 						<td><input type='text' name='conId' value='<?php echo $contact->contact_id; ?>' class='inpText' readonly></td>
   								<td><input type='text' name='conSubject' value='<?php echo $contact->contact_subject; ?>' class='inpText' readonly></td>
   								<td><input type='text' name='conText' value='<?php echo $contact->contact_text; ?>' class='inpText' readonly></td>
   								<td><input type='text' name='conUser' value='<?php echo $contact->user_id; ?>' class='inpText' readonly></td>
   								<td><input type='submit' name='btnDeleteContact' value='DELETE' class='btnDelete'></td>
   							 </tr>
   						 <?php
   		} }?>
   	</tr>
   	</tbody>
   	</table>
   </form>
  	<h2>Gallery</h2>
  	<!--<form action="Admin/gallery" method="POST" enctype="multipart/form-data">-->
    <?php echo form_open_multipart('Admin/gallery', array('method'=>'POST')); ?>
  		<table>
  			<thead>
  				<tr>
  						<th>Gallery ID</th>
  						<th>Gallery Name</th>
  						<th>Gallery Location</th>
  						<th colspan="2">Operation</th>
  				</tr>
  			</thead>
  			<tbody>
  				<tr>
            <?php if (isset($gallery)){
            foreach ($gallery as $gal) {
              ?>
                    <tr>
  				 						<td><input type='text' name='gal_id' value='<?php echo $gal->gallery_id; ?>' class='inpText' readonly></td>
  										<td><input type='text' name='gal_name' value='<?php echo $gal->gallery_title; ?>' class='inpText' ></td>
  										<td><input type='text' name='gal_location' value='<?php echo $gal->gallery_source; ?>' class='inpText'></td>
  										<td><input type='submit' name='btnUpdateGallery' value='UPDATE' class='btnDelete'></td>
  										<td><input type='submit' name='btnDeleteGallery' value='DELETE' class='btnDelete'></td>
  									 </tr>
  					<?php }} ?>
  			</tr>
  			<tr>
  				<td>
  					<input type="text" name="galName" placeholder="Type name of image" class="inpText" id="galName">
  				</td>
  				<td>
  					<input type="text" name="galLoc" placeholder="Type image location" class="inpText" id="galLoc">
  				</td>
          <td>
  					<!--<input type="file" name="galLocFile" id="galLocFile">-->
            <?php echo form_upload(array('name'=>'galLocFile','id'=>'galLocFile')); ?>
  				</td>
  			<td colspan="2">
  				<input type="submit" name="btnInsertGallery" value="ADD" class="btnDelete" style="margin: 0 auto;" id="btnInsertGallery" onclick=" return galCheck();">
  			</td>
  		</tr>
  			</tbody>
  		</table>
  	</form>
  	<h2>About me section</h2>
  	<form action="Admin/about" method="POST">
  		<table>
  			<thead>
  				<tr>
  						<th>AboutMe Id</th>
  						<th>AboutMe title</th>
  						<th>AboutMe text</th>
  						<th>Facebook link</th>
  						<th>Instagram link</th>
  						<th>Google plus link</th>
  						<th>Outlook link</th>
  						<th>Operation</th>
  					</tr>
  			</thead>
  			<tbody>
  				<tr>
  				<?php
          if (isset($about)) {
            foreach ($about as $ab) {
              ?>
  				      <td><input type='text' name='id' value='<?php echo $ab->id; ?>' class='inpText' readonly></td>
  				      <td><input type='text' name='title' value='<?php echo $ab->title; ?>' class='inpText'></td>
  							<td><textarea name='text' maxlength='500' style='border: none; width: 100%; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; max-width:200px'><?php echo $ab->text; ?></textarea></td>
  							<td><input type='text' name='fb' class='inpText' value='<?php echo $ab->fb_link; ?>'></td>
  							<td><input type='text' name='insta' class='inpText' value='<?php echo $ab->in_link; ?>'></td>
  							<td><input type='text' name='gplus' class='inpText' value='<?php echo $ab->gp_link; ?>'></td>
  							<td><input type='text' name='out' class='inpText' value='<?php echo $ab->ou_link; ?>'></td>
  							<td><input type='submit' name='btnUpdateAbout' value='UPDATE' class='btnDelete'></td>
  							<?php
              }
            }
               ?>
  		</tr>
  	</tbody>
  	</table>
  	</form>
  	<h2>Projects section</h2>
  	<form action="Admin/project" method="POST">
  		<table>
  			<thead>
  				<tr>
  						<th>Project Id </th>
  						<th>Project title</th>
  						<th>Project link</th>
  						<th>Project image</th>
  						<th>Operation</th>
  					</tr>
  			</thead>
  			<tbody>
  				<tr>
  				<?php
            if (isset($projects)) {
            foreach ($projects as $project) {
           ?>
              <tr>
                <td><input type='text' name='id' value='<?php echo $project->project_id; ?>' class='inpText' readonly></td>
  							<td><input type='text' name='title' class='inpText' value='<?php echo $project->project_title; ?>'></td>
  							<td><input type='text' name='link' class='inpText' value='<?php echo $project->project_link; ?>'></td>
  							<td><input type='text' name='image' class='inpText' value='<?php echo $project->project_img; ?>'></td>
                <td><input type="submit" name="btnUpdateProject" value="UPDATE" class="btnDelete"></td>
              </tr>
  						 <?php }} ?>
  		</tr>
  			</tbody>
  		</table>
  	</form>
    <h2>Commentary section</h2>
  	<form action="Admin/posts" method="POST">
  		<table>
  			<thead>
  				<tr>
  						<th>Comment Id </th>
  						<th>Comment text</th>
  						<th>Comment date</th>
  						<th>Comment user</th>
  						<th>Operation</th>
  					</tr>
  			</thead>
  			<tbody>
  				<?php
            if (isset($posts)) {
            foreach ($posts as $post) {
           ?>
              <tr>
                <td><input type='text' name='id' value='<?php echo $post->id_comment; ?>' class='inpText' readonly></td>
                <td><textarea name='text' maxlength='500' style='border: none; width: 100%; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; max-width:200px'><?php echo $post->comment_content; ?></textarea></td>
  							<td><input type='text' name='link' class='inpText' value='<?php echo $post->date; ?>'></td>
  							<td><input type='text' name='image' class='inpText' value='<?php echo $post->user_id; ?>'></td>
                <td><input type="submit" name="btnDeletePost" value="DELETE" class="btnDelete"></td>
              </tr>
  						 <?php }} ?>
           <tr>
         		 <td colspan="3">
         			 <input type="text" name="text" placeholder="Type post" class="inpText">
         		 </td>
         		 <td colspan="2">
         			 <input type="submit" name="btnPostAdd" value="ADD" class="btnDelete" style="margin: 0 auto;">
         		 </td>
         	 </tr>
  			</tbody>
  		</table>
  	</form>
  </div>
</section>
</section>
