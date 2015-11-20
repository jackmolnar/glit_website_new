#!/usr/bin/perl
alarm(300);
# Generic Email Form Version 1.0
# Alan <aland> 12-28-95
# Requires CGI.pm and perl 5.xxx
# Modify only the Variables, and choose the subroutines you want

 use CGI;
 $in = new CGI;

###########################################
# Variables                               #
# and Subroutine calls
###########################################

$LOCATION = "http://www.erieit.edu/admissions/schedule a tour of erie institute of technology/tour thanks/";

$MAILTO{ To } = "jonm\@glit.edu"; 
$MAILTO{ From } = "ScheduleATour\@erieit.edu"; 
$MAILTO{ Subject } = "Request a Tour";
$FROMLINK = $ENV{ HTTP_REFERER };

 &send_mail();

 &return_location();

 exit;

###########################################
#  Standard Subroutines Available:
#
#  return_location() -returns $LOCATION page
#
#  return_page() - Returns a html confirmation page, "Your Mail has been
#		  sent", with link back to page they came from
#
#  send_mail() - sends mail, using params from %MAILTO variable
#
###########################################

########################################
#  Do not modify below this line       #
########################################

sub return_location
{
 
  print "Location: $LOCATION\n\n";

}

sub return_page
{

 print $in->header;

 print $in->start_html(-title=>"Your Mail was Sent",
			  -BGCOLOR=>"#ffffff");

 print "<h2 align=center>Your Mail has been Sent</h2>\n";
 print "<br><br><p align=center>\n";
 print "<a href=\"$FROMLINK\">Go Back</a></p>\n";

 print $in->end_html;

} 


sub send_mail
{
   

   open (MAIL,"| /usr/lib/sendmail -t -oi");

   print MAIL "To: $MAILTO{ To }\n";
   print MAIL "From: $MAILTO{ From }\n";
   print MAIL "Subject: $MAILTO{ Subject }\n\n\n";

   &dumpvars();
  
   close (MAIL);

}

sub required_fields
{
    print "Location: $required_page\n\n";
    exit;
}


# routine to dump all incoming name/value pairs
sub dumpvars
{
  @names = $in->param;
  foreach (@names) {
	print MAIL "$_ : ",$in->param($_),"\n";
   }
   
}


sub complain
{
 print $in->header;
 print $in->start_html;
 print $in->dump;
 print "<p><hr><p>\n";
 print @_;
 exit;
}



























