<?php
	require_once('../Connections/chroma.php');
	require_once('../includes/usedfunctions.php');
    $dataArr=array();
    $id="";
    $approved="N";
    
    if(isset($_GET['var'])){
        
        $dataMit=str_replace("__1","~",$_GET['var']);
        
        $dataMit=str_replace("__2","=",$dataMit);
        
         $dataMit=str_replace("__3"," ",$dataMit);
         
        $data=$dataMit;
        
        
        $dataArr=explode("~",$data);
        //print_r($dataArr);die;
        $id=explode("=",$dataArr[2])[1];  
        $sql= "SELECT * FROM job_auth where job_id='$id'";
        //echo $sql;die;
        $stmt = $conn->prepare($sql);
    			$stmt->execute();
    			$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    			
    			for ($y = 0; $y < count($res); $y++) 
    			{
    			    $approved="Y";
                }
       // print_r($dataArr);die;
    }
    
    if(isset($_POST['approve'])){
        //approve trans
          $id=$_POST['jobid'];    
          $sql= "insert into job_auth (job_id,app_flag) values ('$id','Y')";
          $stmt = $conn->prepare($sql);
          if($stmt->execute()){
              echo 0;die;
          }else{
              echo 1;die;
          }
          
    }
    ?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>CHROMA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8" />
    <meta name="keywords" />
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- Custom Theme files -->
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
    <link href="css/style.css" type="text/css" rel="stylesheet" media="all">
    <!-- color switch -->
    <link href="css/blast.min.css" rel="stylesheet" />
    <!-- lightbox -->
    <link rel="stylesheet" href="css/lightbox.min.css">
    <!-- portfolio -->
    <link rel="stylesheet" href="css/portfolio.css">
    <!-- font-awesome icons -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- //Custom Theme files -->
    <!-- online-fonts -->
    <link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    
    <div id="home" class="banner" data-blast="bgColor">
      
        <!-- banner -->
        <div class="container-fluid">
            <div class="row banner-row" style='margin-top:-70px'>
                <div class="col-lg-12 bg-img text-center">
                    <img src="../../logo.png" alt="" class="img-fluid m-auto"  width='100px'/>
                    <h3 class="agile-title">Verification Portal</h3>
                     <div class="col-lg-12">
                    <div class="agileits-about-grids">
                         <h3 class="w3ls-title text-uppercase text-black">Job Details</h3>
                        <span class="fa fa-thumbs-up" aria-hidden="true" data-blast="color"></span>
                         <div class='row'>
                            <div class='col-lg-3'><h4><font>Job Name</font></h4></div>
                             <div class='col-lg-3'><?php echo explode("=",$dataArr[1])[1];?></div>
                      </div>
                        <div class='row'>
                            <div class='col-lg-3'><h4>Job Id</h4></div>
                             <div class='col-lg-3'><?php echo explode("=",$dataArr[2])[1];?></div>
                      </div>
                        <div class='row'>
                            <div class='col-lg-3'><h4><font>Amount</font></h4></div>
                              <div class='col-lg-3'><span style='font-size:25px;color:#000'><?php echo 'GHS '.explode("=",$dataArr[0])[1];?></span></div>
                      </div>
                      
                       <div class="panel-group" id="accordion4" role="tablist" >
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne4">
                                <h4 class="panel-title">
                                    <a role="button"
                                         data-blast="bgColor">
                                        <i class="icon fa fa-globe text-white"></i>
                                        File1.png
                                    </a>
                                </h4>
                            </div>
                           
                        </div>
                       
                          
                    </div>
                    
                     <center><input type="button" id='approve' name="submit" class="btn btn-primary btn-lg" style='width:100%' value="Click Here to Approve"></center>
                </div>

                </div>
               
            </div>
        </div>
        <!-- //banner -->
    </div>
       <!-- //about -->
   
   
 
  
    <!-- contact -->
    <section class="wthree-row  w3-contact" id="contact">
        <div class="container py-5">
            <div class="title-section py-lg-5 text-center">
                <h3 class="w3ls-title text-uppercase">contact us</h3>
            </div>
            <div class="row contact-form pt-5">
                <div class="offset-lg-2"></div>
                <div class="col-lg-8 wthree-form-left">
                    <!-- contact form grid -->
                    <fieldset class="contact-top1" data-blast="borderColor">
                        <legend class="text-dark mb-4 text-capitalize" data-blast="bgColor">send us a
                            note</legend>
                        <form action="#" method="get" class="f-color">
                            <div class="form-group">
                                <label for="contactusername">Name</label>
                                <input type="text" class="form-control" id="contactusername" required placeholder="Enter your name">
                            </div>
                            <div class="form-group">
                                <label for="contactemail">Email</label>
                                <input type="email" class="form-control" id="contactemail" required placeholder="Enter your Email">
                            </div>
                            <div class="form-group">
                                <label for="contactcomment">Your Message</label>
                                <textarea class="form-control" rows="5" id="contactcomment" required placeholder="your message"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Send</button>
                        </form>
                    </fieldset>
                    <!--  //contact form grid ends here -->
                </div>
                <div class="offset-lg-2"></div>
            </div>
           
        </div>
    </section>
    <!-- //contact -->
  
 
    <div class="cpy-right text-center py-2" data-blast="bgColor">
        <p class="text-dark">© <?php echo date('Y')?> Chromagh. All rights reserved 
        </p>
    </div>
    <!-- js -->
    <script src="js/jquery-2.2.3.min.js"></script>
    <!-- //js -->
    <!--  menu toggle -->
    <script src="js/menu.js"></script>
    <!-- color switch -->
    <script src="js/blast.min.js"></script>
    <!-- light box -->
    <script src="js/lightbox-plus-jquery.min.js"></script>
    <!-- Scrolling Nav JavaScript -->
    <script src="js/scrolling-nav.js"></script>
    <!-- start-smooth-scrolling -->
    <script src="js/move-top.js"></script>
    <script src="js/easing.js"></script>
    <script>
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();

                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });
    </script>
    <!-- //end-smooth-scrolling -->
    <!-- smooth-scrolling-of-move-up -->
    <script>
        $(document).ready(function () {
          
            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });
    </script>
    <script src="js/SmoothScroll.min.js"></script>
    <!-- //smooth-scrolling-of-move-up -->
    <!-- Bootstrap core JavaScript
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.js"></script>
    <script>
       $("#approve").click(function(){
        var id="<?php echo $id;?>";
        if(id.length==0){
            alert("Cant Approve this transaction. Please try again later");
            return;
        }
       $('#approve').val("Please wait...");
       document.getElementById("approve").disabled = true;
       $.post( "feed.php", { approve: "Y", jobid:id })
      .done(function( data ) {
          if(data=="0"){
        $('#home').html("<font color='green'><center> <h3><font color='white'>Approval Successful</font> </h3></center></font>");
              
          }else{
              $('#approve').val("Click Here to Approve");
              document.getElementById("approve").disabled = false;
              alert("An Error has occurred whiles approving this transaction");
          }
      });
});
    var approved="<?php echo $approved;?>";
    if(approved=="Y"){
          $('#home').html("<font color='red'><center> <h3><font color='white'>You have already approved</font> </h3></center></font>");
    }
    </script>
</body>

</html>