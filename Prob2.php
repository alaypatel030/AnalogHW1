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
  <title>Question 2</title>
  <link rel="stylesheet" type="text/css" href="semantic/out/semantic.min.css">
  <link rel="stylesheet" type="text/css" href="mysite.css">
  <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
  <script src="semantic/out/semantic.min.js"></script>
  <script src="js/mysite.js"></script>
  <!-- https://semantic-ui.com/behaviors/form.html -->
<script>
  $(document)
    .ready(function() {
      $('.ui.form')
        .form({
          fields: {
            Ni: {
              identifier: 'Ni',
              rules: [{
                  type: 'empty',
                  prompt: 'Please enter Ni'
                },
                {
                  type: 'regExp[/[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?/]',
                  prompt: 'Please enter valid "Ni" value in format of "10000" or "1.0x10^20" or  1.00" or "1.0E1" "1E1 or 1e1 or 1.0e1 '
                }]
            },
          }
        });
    });

</script>
</head>

<body>
  <!--This is all stuff for the menubar-->
  <div style="background-color: #008080">
    <br>
  </div>
  <!-- Following Menu -->
  <div style="background-color: #008080" class="ui inverted top fixed hidden menu">
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
        <p class="ui inverted horizontal divider header"><i><font size="5">Question 2</font></i></p><br>
        <p class="ui inverted horizontal divider header">
          <font size="10" Color="#feca14">Temperature Solver</font></p>
            <p class="ui inverted horizontal divider header">
              <font size="5" Color="DAFF33">For Intrinsic Carrier Concentration of Silicon</font></p>
              <div class="ui section divider"></div>
       </div>
    </div>
</div>

<div style="background-color: white">
  <br>
</div>

<center>
<div style="background-color:#008080">
  <div style='width:80%'>
    <br>
        <center>
          <div style="width:50%">
            <br>
              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return formValidation()" method="post" autocomplete="off" name="myform" class="ui large form">
              <div class="ui inverted segment">

                <div class=" ui inverted form">
                  <div class="ui  inverted stacked segment">
                    <div class="ui equal width form">
                      <div class="ui inverted two large buttons">
                            <button  class="ui inverted white basic button"></i>Sillicon</button>
                      </div>

                      <br><br>
                      <div class="field">
                      <div class="ui right labeled input">
                            <input type="text" id= "Ni" name="Ni" placeholder="Enter Ni"/>
                        <div class="ui basic label">
                        <?php Print "<a href='#'><font color='black'> &nbsp;cm<sup>-3</font></a>" ?> </div>

                        </div>
                      </div>
                      <br>
                      </div>
                    <center>
                    <div class="ui inverted two large buttons">
                        <button class="ui two green basic animated fade button" type="Submit" value="Calculate">
                          <div class="hidden content" type="Submit">Get Results</div>
                          <div class="visible content" type="Submit">Submit</div>
                        </button>
                    </div>
                        <div class="ui error message"></div>
                        <br>
                    <?php

                    if(isset($_POST['Ni'])) {
                      $ni = 'solve' .($_POST['Ni'].' = (5.23e15)*(T)^(3/2)*e^(-1.1/(2*(86*10^-6)*T))');

                        include 'wa.php';
                        $appID = 'P9RXAT-T742XAWVAE';

                          $qArgs = array();
                          if (isset($_REQUEST['assumption']))
                            $qArgs['assumption'] = $_REQUEST['assumption'];

                          $engine = new WolframAlphaEngine( $appID );
                          $response = $engine->getResults( $ni, $qArgs);
                        ?>
                        <br>
                            <table border=0 width="80%" align="center">
                        <?php
                            foreach ( $response->getPods() as $pod ) {
                        ?>
                              <tr>
                                <td>
                                <center><br><a href='#'><font size='5' color='Yellow'>- : <?php echo $pod->attributes['title']; ?> : -<br/><br/></font></a>
                        <?php
                                // each pod can contain multiple sub pods but must have at least one
                                foreach ( $pod->getSubpods() as $subpod ) {
                                  // if format is an image, the subpod will contain a WAImage object
                        ?>
                                  <img src="<?php echo $subpod->image->attributes['src']; ?>">
                                  <hr>
                        <?php
                                }
                        ?>
                                </td>
                              </tr>
                        <?php
                            }
                        ?>
                            </table>
                        <?php
                          }
                          ?>
                    </center>
                    </center>

                  </div>
                </div>
              </div>
            </form>
                <div style="background-color:#008080"><br><br></div>

                </head>
                <body>
                <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>


          </div>
      </div>
    </div>
    </div>
  </div>
</div>
</div>
    <div style="background-color:white"><br></div>
  <div style="background-color: black">
    <br>
    <h4 class="ui horizontal header divider">
        <a href="#"><font size="5">Social Networks</font></a>
      </h4><br>
    <center>
      <button  class="ui inverted blue basic button"><i class="icon facebook"></i>Facebook</button>
      <button  class="ui inverted red basic button"><i class="icon instagram"></i>Instagram</button>
      <button  class="ui inverted blue basic button"><i class="icon twitter"></i>Twitter</button>
      <br><br>
      <br>
  </div>
</body>
</html>
