<!--This is the deadult marks entry system  - It begins by prompting user to enter exam details and ends by viewing and generating reports-->
<?php

session_start();

// Check if the user is logged in
if (!isset($_SESSION['staffid'])) {
    // Redirect to the login page if not logged in
    header("Location: portal-login.php");
    
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['grade']) && isset($_POST['stream']) && isset($_POST['year']) && isset($_POST['term']) && isset($_POST['type'])) {
    $grade = filter_input(INPUT_POST, 'grade', FILTER_SANITIZE_STRING);
    $stream = filter_input(INPUT_POST, 'stream', FILTER_SANITIZE_STRING);
    $year = filter_input(INPUT_POST, 'year', FILTER_SANITIZE_STRING);
    $term = filter_input(INPUT_POST, 'term', FILTER_SANITIZE_STRING);
    $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING);


    require("./connect.php");

    // Establish database connection
    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }

    if ($grade && $stream && $year && $term && $type) {

            // Check if the regno already exists in the database
            $check_query = "SELECT * FROM marksdetails WHERE grade = ? AND stream = ? AND year = ? AND term = ? AND type = ?";
            $check_stmt = $connect->prepare($check_query);
            $check_stmt->bind_param('sssss', $grade,$stream,$year,$term,$type);
            $check_stmt->execute();
            $result = $check_stmt->get_result();

            if ($result->num_rows > 0) {
                echo "<script>
                        if(confirm('Marks details already exist.')) {
                            window.document.getElementById('nextbtn').click();

                        }

                       // window.location = './markxer.php';


                    </script>";
            } else {
                // Prepare the SQL statement using a prepared statement to prevent SQL injection
                $insert_stmt = $connect->prepare("INSERT INTO marksdetails (grade,stream,year, term,type )  
                VALUES (?, ?, ?, ?, ?)");

                // Bind parameters and execute the query
                $insert_stmt->bind_param('sssss', $grade,$stream,$year,$term,$type);
                $insert_stmt->execute();

                if ($insert_stmt->affected_rows > 0) {
                    echo "<script>
                            alert('Marks details entered Successful!');
                            window.document.getElementById('nextbtn').click();
                            //call the next slide btn
                            

                        </script>";
                } else {
                    echo "<script>
                            alert('Kindly try again');
                        </script>";
                }

                // Close the statement for insertion
                $insert_stmt->close();
            }

            // Close the connection and statement for checking regno
            $check_stmt->close();

                

    } else {
        echo "<script>
                alert('All fields are required');
                window.location = './markxer.php';
            </script>";
    }        




    // // Close prepared statement and database connection
    // $stmt->close();
    
    $connect->close();


} 
// else {
//     echo "Invalid request.";
// }

?>

<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Marks System</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./markxer.css">
        <!-- <link rel="stylesheet" href="./cpsmarkssystem.css"> -->

    </head>
    <body>
        <div class="slideexamsContainer">
            <div class="slideexholder">
                <div class="slide-number">1/4</div>
                <!-- PROCESS/SLIDE ONE - Select exam name, year, term, type, etc-->
                <p>Select grade, stream, year, term and level, and click save for the exam you want to enter marks for.</p>
                <div class="filterContainer">
                    <!--Filter-->
                        <div class="examsheader">
                          <div class="exgradetitle exgrade1 exgrade">Grade</div>
                          <div class="exgradetitle exgrade1 exstream">Stream</div>
                          <div class="exgradetitle exgrade1 exyear">Year</div>
                          <div class="exgradetitle exgrade1 exterm">Term</div>
                          <div class="exgradetitle exgrade1 exlevel">Level</div>
                        </div>
                        <div class="exroot filterroot">
                
                
                            <!--Grade-->
                            <form action="./markxer.php" method="post" class="exreslts" id="exreslts">
                                <select title="Grade" accesskey="s" name="grade" class="exfilter" id="gradeftr">
                                    <option class="optionVal" value="No Grade Selected" id="fgradedef">--Select Grade/Class--</option>
                                    <option class="optionVal" value="Grade One" id="fgrade1">Grade 1</option>
                                    <option class="optionVal" value="Grade Two" id="fgrade2">Grade 2</option>
                                    <option class="optionVal" value="Grade Three" id="fgrade3">Grade 3</option>
                                    <option class="optionVal" value="Grade Four" id="fgrade4">Grade 4</option>
                                    <option class="optionVal" value="Grade Five" id="fgrade5">Grade 5</option>
                                    <option class="optionVal" value="Grade Six" id="fgrade6">Grade 6</option>
                                    <option class="optionVal" value="Grade Seven" id="fgrade7">Grade 7</option>
                                    <option class="optionVal" value="Grade Eight" id="fgrade9">Class 8</option>
                                </select>
                                <!--Stream-->
                                <select title="Stream" accesskey="s" name="stream" class="exfilter" id="streamftr">
                                    <option class="optionVal" value="default" id="fstreamdef">--Select Stream--</option>
                                    <option class="optionVal" value="X" id="fstreamx">X</option>
                                    <option class="optionVal" value="Y" id="fstreamy">Y</option>
                                    <option class="optionVal" value="Z" id="fstreamz">Z</option>
                                </select>
                
                                <!--Year-->
                
                                <select title="Year" accesskey="s" name="year" id="yearftr" class="exfilter yrfilter">
                                    <option class="optionVal" value="defaultopt" id="fyeardef">--Select Year--</option>
                                    <option class="optionVal" value="2000" id="fyear0">2000</option>
                                    <option class="optionVal" value="2001" id="fyear1">2001</option>
                                    <option class="optionVal" value="2002" id="fyear2">2002</option>
                                    <option class="optionVal" value="2003" id="fyear3">2003</option>
                                    <option class="optionVal" value="2004" id="fyear4">2004</option>
                                    <option class="optionVal" value="2005" id="fyear5">2005</option>
                                    <option class="optionVal" value="2006" id="fyear6">2006</option>
                                    <option class="optionVal" value="2007" id="fyear7">2007</option>
                                    <option class="optionVal" value="2008" id="fyear8">2008</option>
                                    <option class="optionVal" value="2009" id="fyear9">2009</option>
                                    <option class="optionVal" value="2010" id="fyear10">2010</option>
                                    <option class="optionVal"  value="2011" id="fyear11">2011</option>
                                    <option class="optionVal" value="2012" id="fyear12">2012</option>
                                    <option class="optionVal" value="2013" id="fyear13">2013</option>
                                    <option class="optionVal" value="2014" id="fyear14">2014</option>
                                    <option class="optionVal" value="2015" id="fyear15">2015</option>
                                    <option class="optionVal" value="2016" id="fyear16">2016</option>
                                    <option class="optionVal" value="2017" id="fyear17">2017</option>
                                    <option class="optionVal" value="2018" id="fyear18">2018</option>
                                    <option class="optionVal" value="2019" id="fyear19">2019</option>
                                    <option class="optionVal" value="2020" id="fyear20">2020</option>
                                    <option class="optionVal" value="2021" id="fyear21">2021</option>
                                    <option class="optionVal" value="2022" id="fyear22">2022</option>
                                    <option class="optionVal" value="2024" id="fyear23">2024</option>
                                </select>
                
                                <!--Term-->
                                <select title="Term" accesskey="s" name="term" class="exfilter" id="termftr">
                                <option class="optionVal" value="default" id="ftermdef">--Select Term--</option>
                                    <option class="optionVal" value="One" id="ftermone">1ST TERM</option>
                                    <option class="optionVal" value="Two" id="ftermtwo">2ND TERM</option>
                                    <option class="optionVal" value="Three" id="ftermthree">3RD TERM</option>
                                </select>
                
                                
                                <!--Type-->
                                <select title="Type" accesskey="s" name="type" class="exfilter" id="typeftr">
                                <option class="optionVal" value="default" id="ftypedef">--Select Type--</option>
                                    <option class="optionVal" value="Opener" id="ftypeopener">Opener</option>
                                    <option class="optionVal" value="Midterm" id="ftypemid" >Mid TERM</option>
                                    <option class="optionVal" value="Endterm" id="ftypeend">End TERM</option>
                                    <option class="optionVal" value="C.A.T" id="ftypeother">C.A.T</option>
                                    <option class="optionVal" value="Other" id="ftypeother">Other</option>

                                </select>
                                
                
                                <div class="examSearch">
                                    <button id="exTySearch" class="cpsbtn" type="submit">Save</button>
                                </div>
                            </form>
                        </div>

                        <!-- ENDIF - SLIDE ONE - PROCESS ONE-->
                        <div class="slideex-caption">Done? Click Next</div>
                </div>
            </div>

            <div class="slideexholder">
                <div class="slideex-number">2/4</div>
                        <!--ENTER RUBRICS-->
                            <!--Upload marks - modified-->
                <div id="bodyRoot" class="body_root">
                    <div class="header-mark">
                        <h3 class="header_marker">Enter Rubrics</h3>
                        <p  class="nozeros"><span style="font-weight: 800;">NB:</span>Start Below Expectations from 1 not 0.<span></span></p>
                    </div>
                    <form method="post" action="./rubrica.php" class="main_root">
                        <!--Rows with at least two subjects inline-->
                        <div class="row row_one">
                            <!--start MATHEMATICS RUBRICS-->

                            <div class="subject_box subject_math">
                                <!--Select Rubric Category/Name-->
                                <label for="rubricname">Select Rubric Name</label>
                                <select name="rubricname" class="exfilter sflexinp" id="statusftr">
                                    <option class="optionVal" value="" id="fhstatusdef" disabled selected>--Select Rubric Name--</option>
                                    <option class="optionVal" value="Rubric One" id="fhstatur1">Rubric One</option>
                                    <option class="optionVal" value="Rubric Two" id="fhstatur2">Rubric Two</option>
                                    <option class="optionVal" value="Rubric Three" id="fhstatr3">Rubric Three</option>
                                    <option class="optionVal" value="Rubric Four" id="fhstatur4">Rubric Four</option>
                                    <option class="optionVal" value="Rubric Five" id="fhstatur5">Rubric Five</option>
                                    
                                </select>

                                <label for="subjectname">Select Subject</label>
                                <!--Select Subject Name-->
                                <select name="subjectname" class="exfilter sflexinp" id="statusftr">
                                    <option class="optionVal" value="" id="fhstatusdef" disabled selected>--Select Subject Name--</option>
                                    <option class="optionVal" value="Mathematics" id="fhstatusx">Mathematics</option>
                                    <option class="optionVal" value="English" id="fhstatusy">English</option>
                                    <option class="optionVal" value="Reading" id="fhstatuc">Reading</option>
                                    <option class="optionVal" value="Composition" id="fhstatucc">Composition</option>
                                    <option class="optionVal" value="Kiswahili" id="fhstatusz">Kiswahili</option>
                                    <option class="optionVal" value="Kusoma" id="fhstatuku">Kusoma</option>
                                    <option class="optionVal" value="Insha" id="fhstatusha">Insha</option>
                                    <option class="optionVal" value="Science & Technology" id="fhstatusz">Scie & Tech.</option>
                                    <option class="optionVal" value="Social Studies" id="fhstatusz">Social Studies</option>
                                    <option class="optionVal" value="C.R.E" id="fhstature">C.R.E</option>
                                    <option class="optionVal" value="Integrated Science" id="fhstatusz">Integrated Scie.</option>
                                    <option class="optionVal" value="Pretchnical Studies" id="fhstatusz">Pretech.</option>
                                    <option class="optionVal" value="Agric & Nutrition" id="fhstatusz">Agri & Nutrition</option>
                                    <option class="optionVal" value="Creative Arts" id="fhstatusz">C/A & Sports</option>
                                    <option class="optionVal" value="Environmental Ed" id="fhstatusy">Environmental Education</option>

                                </select>
                                <!--Select Grade/Class-->
                                <label for="grade">Select Grade/Class</label>
                                <select name="grade" class="exfilter sflexinp" id="gradeftr">
                                    <option class="optionVal" value="" id="fgradedef" disabled selected>--Select Grade/Class--</option>
                                    <option class="optionVal" value="Grade One" id="fgrade1">Grade 1</option>
                                    <option class="optionVal" value="Grade Two" id="fgrade2">Grade 2</option>
                                    <option class="optionVal" value="Grade Three" id="fgrade3">Grade 3</option>
                                    <option class="optionVal" value="Grade Four" id="fgrade4">Grade 4</option>
                                    <option class="optionVal" value="Grade Five" id="fgrade5">Grade 5</option>
                                    <option class="optionVal" value="Grade Six" id="fgrade6">Grade 6</option>
                                    <option class="optionVal" value="Grade Seven" id="fgrade7">Grade 7</option>
                                    <option class="optionVal" value="Grade Eight" id="fgrade8">Grade 8</option>
                                    <option class="optionVal" value="Grade Nine" id="fgrade9">Grade 9</option>
                                    <option class="optionVal" value="Grade Ten" id="fgrade10">Grade 10</option>
                                    <option class="optionVal" value="Grade Eleven" id="fgrade11">Grade 11</option>
                                    <option class="optionVal" value="Grade Twelve" id="fgrade12">Grade 12</option>

                                </select>
                                <!--EE-->
                                <div class="inputsrubri">
                                    <p class="rubrictag">EE</p>
                                    <div class="ininputsrubri">
                                        <p class="rubfrom">From</p>   
                                    <input type="number" id="fromee" class="subject_input" placeholder="Rubric From" name="fromee" required>
                                    <p class="rubto">to</p>   
                                    <input type="number" id="toee" class="subject_input" placeholder="Rubric To" name="toee" required>
                                </div>
                                </div>
                                <!-- ME-->
                                <div class="inputsrubri">
                                    <p class="rubrictag">ME</p>
                                    <div class="ininputsrubri">
                                        <p class="rubfrom">From</p>   
                                    <input type="number" id="fromme" class="subject_input" placeholder="Rubric From" name="fromme" required>
                                    <p class="rubto">to</p>   
                                    <input type="number" id="tome" class="subject_input" placeholder="Rubric To" name="tome" required>
                                </div>
                                </div>

                                <!--AE-->

                                <div class="inputsrubri">
                                    <p class="rubrictag">AE</p>
                                    <div class="ininputsrubri">
                                        <p class="rubfrom">From</p>   
                                    <input type="number" id="fromae" class="subject_input" placeholder="Rubric From" name="fromae" required>
                                    <p class="rubto">to</p>   
                                    <input type="number" id="toae" class="subject_input" placeholder="Rubric To" name="toae" required>
                                </div>
                                </div>

                                <!--BE-->
                                <div class="inputsrubri">
                                    <p class="rubrictag">BE</p>
                                    <div class="ininputsrubri">
                                        <p class="rubfrom">From</p>   
                                    <input type="number" id="frombe" class="subject_input" placeholder="Rubric From" name="frombe" required>
                                    <p class="rubto">to</p>   
                                    <input type="number" id="tobe" class="subject_input" placeholder="Rubric To" name="tobe" required>
                                </div>
                                </div>
                            </div>

                            <!--END MATHEMATICS RUBRICS-->

                            
                        </div>


                        <!--End rows-->

                        <hr color="lightgray">
                        <div class="stdActbtns">

                            <div class="stdActbtnsIn">

                                <button type="submit" id="closeGradebox" class="stdinfobtn">Submit</button>

                            </div>                
                        </div>
                    </form>
                    

                    

                </div>

                        <!--END RUBRICS-->
                <div class="slideex-caption">That's it</div>
            </div>


            <!-- 
            <button class="previ pushBtn" onclick="pushSlide(-1)">&#10094;</button>
            <button class="nexti pushBtn" onclick="pushSlide(1)">&#10095;</button> -->

            
            <button id="prevbtn" class="prev pushBtn" onclick="pushSlide(-1)">Previous</button>
            <button id="nextbtn" class="next pushBtn" onclick="pushSlide(1)">Next</button>
        </div>
        <div class="examSearch">
            <a id="exTySearch" href="./cpsmarkssystem.php" class="cpsbtn" type="button">Back</a>
        </div>
        
    </body>
    <script>
      //Slide carousel manual 

let slideexCounter = 1;
displayexSldes();


//btns

function pushSlide(q) {
    displayexSldes(slideexCounter += q);
}



function displayexSldes(q) {
    let e, slideexHolders;


    slideexHolders = document.getElementsByClassName("slideexholder");

    for(e = 0;e < slideexHolders.length;e++) {
        slideexHolders[e].style.display = 'none';
    }


    if(q > slideexHolders.length) {
        slideexCounter = slideexHolders.length;
    }

    if(q < 1) {
        slideexCounter = 1;
    }

    slideexHolders[slideexCounter-1].style.display = "block";
}



    </script>
</html>