<div class="row program_page_header">
<div class="container">
	<h1>News</h1>
    </div>
</div>
<div class="row breadcrumb_bar">
<div class="container">
	<?php echo $breadcrumbs; ?>
    </div>
</div>
<div class="row pagination_bar">
<div class="container">
	<?php echo $pagination; ?>
    </div>
</div>

      <hr class="featurette-divider">

      <div class="row news_row">
      <div class="container marketing">
      
      <?php if (isset($news) && count($news) > 0){
		   
		   //set even odd iterator
		   	$r = 0;
			
			print '<div class="row">';
			  
			  foreach($news as $row){
				 
				  print "
				  	<a href='".site_url('blog/'.$row['slug'])."' class='col-sm-6'>
						<div class='row'><h4>".$row['title']."</h4><span class='index_date'>".$row['news_date']."</span></div>
						<div class='row' style='padding-top:10px;'>
							<div class='news_image_index img-circle' ><img src='".site_url('../'.$row['image'])."' ".$row['image_alt_text']." style='".$row['max_size_dimension'].$row['img_offset']."' /></div>
							<div class='news_text_index'>".$row['content']."<br/><br/>
								<button type='button' class='btn btn-default btn-xs' href='".site_url('blog/'.$row['slug'])."'>Read More</button>
							</div>
						</div>
					</a>
          
          			";
					
					//check whether iterator is even or odd, print appropriate <div> tag
				  if($r % 2 != 0){
					  print "</div><div class='row'>";
				  }
				  
				  $r++;
				  
			  }
			  
	  }
	  
	  ?>
     
      </div>
      </div>

      <hr class="featurette-divider">

      <!-- /END THE FEATURETTES -->
      
</div>