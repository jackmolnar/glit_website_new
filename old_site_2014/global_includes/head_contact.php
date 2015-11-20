<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-3586660-5']);
  _gaq.push(['_addIgnoredOrganic', 'www.erieit.edu']);
  _gaq.push(['_addIgnoredOrganic', 'www.erieit.com']);
  _gaq.push(['_addIgnoredOrganic', 'erieit.edu']);
  _gaq.push(['_addIgnoredOrganic', 'erie institute of technology']);
  _gaq.push(['_addIgnoredOrganic', 'erie institute technology']);
  _gaq.push(['_addIgnoredOrganic', 'eit']);
  _gaq.push(['_addIgnoredOrganic', 'eit erie pa']);
  _gaq.push(['_addIgnoredOrganic', 'eit erie']);
  _gaq.push(['_addIgnoredOrganic', 'erieit.edu']);
  _gaq.push(['_addIgnoredOrganic', 'erie institute of technology erie pa']);
  _gaq.push(['_addIgnoredOrganic', 'eit erie institute of technology']);
    _gaq.push(['_addIgnoredOrganic', 'eit erie institute technology']);
  _gaq.push(['_addIgnoredOrganic', 'eit in erie pa']);
  _gaq.push(['_addIgnoredOrganic', 'erie eit']);
  _gaq.push(['_addIgnoredOrganic', 'erie institute of technology erie pa']);
  _gaq.push(['_addIgnoredOrganic', 'eit erie institute of technology']);
  _gaq.push(['_addIgnoredOrganic', 'eit in erie pa']);
  _gaq.push(['_addIgnoredOrganic', 'erie eit']);
  _gaq.push(['_addIgnoredOrganic', 'erie institue of technology']);
  _gaq.push(['_addIgnoredOrganic', 'erie institute of technology inc - erie pa']);
  _gaq.push(['_addIgnoredOrganic', 'eit in erie, pa']);
  _gaq.push(['_addIgnoredOrganic', 'erieinstituteoftechnology']);
  _gaq.push(['_addIgnoredOrganic', 'eit school']);
  _gaq.push(['_addIgnoredOrganic', 'erie institute of technology inc']);
  _gaq.push(['_addIgnoredOrganic', 'erie institute of tech']);
  _gaq.push(['_addIgnoredOrganic', 'erie pa eit']);

  _gaq.push(['_trackPageview']);
  
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
  
   function get_the_time() {
     var dTime = new Date();
     var hours = dTime.getHours();
	 var period = "";
	 if (hours>5 && hours<10) {
		 period ="6a-10a Morning";
	 } else if (hours>9 && hours<15){
		 period ="10a-3p Mid Day";
	 } else if (hours>14 && hours<19){
		 period ="3p-7p Afternoon";
	 }else if (hours>18 && hours<24){
		 period ="7p-12a Evening";
	 }else if (hours>=0 && hours<6){
		 period ="12a-6a Night Owl"
	 }
	 return period;
}

the_url = window.location.pathname;


  
  function track_req_info(){
	    time_period = get_the_time()
	  _gaq.push(['_setCustomVar', 1, 'Time Frame Goal Completed', time_period, 3]);
	  _gaq.push(['_trackPageview', '/request_more_information_submitted.php']);
	
  }
  
  function track_side_form(){
	   time_period = get_the_time()
	  _gaq.push(['_setCustomVar', 1, 'Time Frame Goal Completed', time_period, 3]);
	  _gaq.push(['_setCustomVar', 2, 'Page Subitted', the_url, 3]);
	  _gaq.push(['_trackPageview', '/side_form_submitted.php']);
	  
  }
  
  function track_apply_online(){
	   time_period = get_the_time()
	  _gaq.push(['_setCustomVar', 1, 'Time Frame Goal Completed', time_period, 3]);
	  _gaq.push(['_trackPageview', '/apply_online_submitted.php']);
	 
  }
  
  function track_sched_tour(){
	   time_period = get_the_time()
	  _gaq.push(['_setCustomVar', 1, 'Time Frame Goal Completed', time_period, 3]); 
	  _gaq.push(['_trackPageview', '/schedule_tour_submitted.php']);
	 
  }
  
   function track_fb_connect(){
	  _gaq.push(['_trackEvent', 'FB Connect', 'Req More Info Page - FB Connect' ]);
   }

</script>

<?

if (isset($_COOKIE["newspaper"]))
  $phone_number = '814-474-7808';
else
  $phone_number = '814-868-9900';
  
  
?>


<div style="float:left; width:100px; height:47px; ">
					<span style=" float:left; margin-top:5px;">
					<!--<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="http://www.facebook.com/erieinstituteoftechnology" layout="button_count" width="200"></fb:like>-->
                    <iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2Ferieinstituteoftechnology&amp;layout=button_count&amp;show_faces=false&amp;width=450&amp;action=like&amp;colorscheme=light&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:93px; height:21px;" allowTransparency="true"></iframe>
                    </span>
                    
                    
                    
                    <!-- Place this tag where you want the +1 button to render -->
<span style="float:left; margin-top:2px;"><g:plusone size="small" href="http://erieit.edu" ></g:plusone></span>

<!--  Place this tag after the last plusone tag -->
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>


                    </div>
                    
                
                <div style="float:left; width:175px;">
                <span style="font-family:'Arial Black', Gadget, sans-serif; font-size:16px; color:#36C">
                <? echo $phone_number; ?><br />
                </span>
                <span style="font-size:10px;">
                Toll Free: 866-868-3743<br />
                940 Millcreek Mall, Erie PA 16565<br />
                </span>
                </div>