<!DOCTYPE html>
<html>

<!--

Author -  Alay Patel
Date : - 10/10/2017
Test01 : - Create an HTML form that will input Information about a student including “first name”, “last name”,
“utc id”, and “current GPA”. Name your html file studentInfo.html. Your form should have a
reset button and a submit button. Your input fields for your form should be inside of a table. The
submit button should send the data to a php file named studentInfo.php. The
studentInfo.php file should check the data submitted by the html file for proper formatting. The
first and last name should be composed of only alphabetical characters, of length no greater than 15.
The UTC ID should be three letters and three numbers. The gpa should be a single number, followed by
a dot, and then another single number. If any field has incorrect data, display an error message and a
link back to the studentInfo.html page. If all the fields are valid, your PHP script should append
the data into a file named studentInfo.txt which should have the following format, and be sorted
by last name. (Note you will need to read in the existing file’s data and add the new data to your data
structure, and sort it before you can write the new file in the proper order).
last:first:utcid:gpa
Once the new data has been received, you should also display ALL data that has been entered into the
text file from your PHP script into an HTMaL table. The table should be sorted by last name just like the
text file.


Framework : - https://semantic-ui.com/
Note : - Also Used Our Assignmnet 2 code...

-->

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimal-ui">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <link rel="icon" type="image/jpg" href="img/logo.jpg">
  <title>Question 1</title>
  <link rel="stylesheet" type="text/css" href="semantic/out/semantic.min.css">
  <link rel="stylesheet" type="text/css" href="mysite.css">
  <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
  <script src="semantic/out/semantic.min.js"></script>
  <script src="js/mysite.js"></script>
  <script type="text/javascript">
    if(getCookie("btn1")=="true") document.getElementById("btn1").disabled=true;
  </script>
  <!-- https://semantic-ui.com/behaviors/form.html -->
<script>
  $(document)
    .ready(function() {
      $('.ui.form')
        .form({
          fields: {
            Temp: {
              identifier: 'Temp',
              rules: [{
                  type: 'empty',
                  prompt: 'Please enter Temperature'
                },
                {
                  type: 'number',
                  prompt: 'Please enter valid Temperature'
                }
              ]
            },

            TempDD: {
              identifier: 'TempDD',
              rules: [{
                  type: 'empty',
                  prompt: 'Please Select Temperature Type'
                }]
            },

            ElmntType: {
              identifier: 'ElmntType',
              rules: [{
                  type: 'empty',
                  prompt: 'Please Select Element Type'
                }]
            },

          }
        });
    });

</script>
</head>


<body>
  <!--This is all stuff for the menubar-->
  <div style="background-color: #FFA07A">
    <br>
  </div>
  <!-- Following Menu -->
  <div style="background-color: #FFA07A" class="ui inverted top fixed hidden menu">
    </div>



<div class="ui inverted vertical masthead center aligned segment" style="background-image:url(img/blur.jpg)">
  <div class="ui container right">
    <center>
      <div class="ui large secondary inverted pointing menu">
        <div class="ui container right">
          <br>
          <div class="ui buttons">
            <br>
            <button onclick="window.location.href='index.html'" class="ui inverted white basic left labeled icon button"><i class="left chevron icon"></i>Back to Home</button>
          <div class="right menu">
          </div>
            <div class='ui eight doubling cards'>
        </div>
      </div>
      </div>
    </center>
  </div>

      <div class="ui text container">
        <br><br><br><br><br><br><br><br>
        <p class="ui inverted horizontal divider header"><i><font size="5">Question 1</font></i></p><br>
        <p class="ui inverted horizontal divider header">
          <font size="10" Color="#feca14">Intrinsic Carrier Concentration</font></p>
            <p class="ui inverted horizontal divider header">
              <font size="7" Color="#feca14"> Calculator</font></p>
          <div class="ui section divider"></div>
        </p>
      </div>
    </div>
</div>

<div style="background-color: white">
  <br>
</div>

<center>
<div style="background-color:#FFA07A">
  <div style='width:80%'>
    <br>


        <center>
          <div style="width:70%">
            <br>

              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return formValidation()" method="post" autocomplete="off" name="myform" class="ui large form">


              <div class="ui inverted segment">

                <div class=" ui inverted form">
                  <div class="ui  inverted stacked segment">
                    <div class="ui equal width form">

                      <div class="fields">
                        <div class="field">
                          <input type="text" name="Temp" placeholder="Enter Desired Temperatue" />
                        </div>
                        <div class="field">
                          <select id="TempDD" name="TempDD" class="ui dropdown">
                            <option value="">Temperature Type</option>
                            <option value="2">Celsius</option>
                            <option value="1">Fahrenheit</option>
                            <option value="0">Kelvin</option>
                          </select>

                        </div>
                      </div>


                    <div  class="field">
                        <select  id="ElmntType" name="ElmntType" class="ui dropdown">
                          <option value="">Element Type</option>
                          <option value="2">Silicon</option>
                          <option value="1">Germanium</option>
                          <option value="0">Gallium Arsenide</option>
                        </select>

                      </div>


                    <center>
                    <div class="ui inverted two large buttons">
                        <button class="ui two green basic animated fade button" type="Submit" value="Calculate">
                          <div class="hidden content" type="Submit">Get Results</div>
                          <div class="visible content" type="Submit">Submit</div>
                        </button>

                    </div>
                    <br>
                    <br>
                        <div class="ui error message"></div>
                    <br>
                    <?php
                    if(is_numeric($_POST['Temp']) && isset($_POST['TempDD']) && isset($_POST['ElmntType'])) {



                      $k = (86*pow(10,-6)); //constant

                      //////////////////////////////////////
                      //Convert input temperature to Kelvin
                      /////////////////////////////////////
                      if($_POST['TempDD'] == 2){
                          $temp = ($_POST['Temp'] + 273.15);
                          $temp = (round($temp,2));
                          $TempDD = 'C';
                      } else if($_POST['TempDD'] == 1){
                          $temp = ($_POST['Temp'] + 459.67)*(5/9);
                          $temp = (round($temp,2));
                          $TempDD = 'F';
                      } else if($_POST['TempDD'] == 0){
                          $temp = $_POST['Temp'];
                          $temp = (round($temp,2));
                          $TempDD = 'K';
                      }

                      ///////////////////////////////////////////////////////////////////
                      //Now check which one of these ( Silicon, Germanium and Gallium Arsenide) element is chosen and
                      //based on chosen element set the value of 'B'.
                      ///////////////////////////////////////////////////////////////////

                      /* for Silicon */
                      if($_POST['ElmntType'] == 2){
                          $ElmntType = 'Si';
                          $B = (5.23*pow(10,15));
                          $Eg = 1.1;
                          $exp = floor(log($B, 10));
                          $B =  sprintf('%.2fE%+03d', $B/pow(10,$exp), $exp);
                      }
                      /* for Germanium */
                      else if($_POST['ElmntType'] == 1){
                          $ElmntType = 'Ge';
                          $Eg = 0.66;
                          $B = (1.66*pow(10,15));
                          $exp = floor(log($B, 10));
                          $B =  sprintf('%.2fE%+03d', $B/pow(10,$exp), $exp);
                      }
                      /* for Gallium Arsenide */
                      else if($_POST['ElmntType'] == 0){
                        $ElmntType = 'GaAs';
                        $Eg = 1.4;
                        $B = (2.10*pow(10,14));
                        $exp = floor(log($B, 10));
                        $B =  sprintf('%.2fE%+03d', $B/pow(10,$exp), $exp);
                      }

                      ///////////////////////////////////////////////////////////////////
                      // Final Calculation
                      ///////////////////////////////////////////////////////////////////
                      $temp = $temp;
                      $ni = ($B*pow($temp,(3/2))*exp(-($Eg)/(2*$k*$temp)));
                      $exp = floor(log($ni, 10));
                      $ni =  sprintf('%.2fE%+03d', $ni/pow(10,$exp), $exp);


                     print  "<br><a href='#'><font size='5' color='Yellow'>- : You Entered : - <br/><br/></font></a>";
                     print "<a href='#'><font size='3' color='white'> ".$_POST['Temp']." &deg;".$TempDD." for ".$ElmntType."<br/><br/></font></a>";
                     print "<a href='#'><font size='5' color='Yellow'>- : Used Values : - <br/><br/></font></a>";
                     print "<a href='#'><font size='3' color='white'> E<sub>g</sub> = ".$Eg." eV<br/><br/>  K = ".$k." eV/K<br/><br/> T = ".$temp." &deg;K <br/><br/> B = ".$B." &nbsp;cm<sup>-3</sup>&nbsp;K<sup>-3/2<br/><br/></font></a>";
                     print "<a href='#'><font size='5' color='#FFB533'>- : Answer : - <br/><br/></font></a>";
                     print "<a href='#'><font size='3' color='white'>N<sub>i</sub> = ".$ni."  &nbsp;cm<sup>-3</font></a>";

                   }
                    ?>
                      </center>

                  </div>


  <br><br>

                </div>


              </div>
              <br>
              <br>


            </form>
          </div>
      </div>
    </div>



  <br><br>
    </div>
  </div>
</div>
</div>

<br>

  <div style="background-color: black">
    <br>


    <h4 class="ui horizontal header divider">

        <a href="#"><font size="5">Social Networks</font></a>
      </h4><br>
    <center>

      <br>
      <br>

      <button  class="ui inverted blue basic button"><i class="icon facebook"></i>Facebook</button>
      <button  class="ui inverted red basic button"><i class="icon instagram"></i>Instagram</button>
      <button  class="ui inverted blue basic button"><i class="icon twitter"></i>Twitter</button>
      <br><br>
      <br>
  </div>
</body>
</html>
