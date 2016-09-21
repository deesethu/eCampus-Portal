<?php

include("mongoConfigBvrit.php");

$mdb=mongoConnect();

$userDetails = $mdb->selectCollection('userDetails');
$facultyDetails = $mdb->selectCollection('facultyDetails');
$rootDetails = $mdb->selectCollection('rootDetails');
$questions = $mdb->selectCollection('questions');
$dataQuestions = $mdb->selectCollection('dataQuestions');
$materials = $mdb->selectCollection('materials');
$testCorrect = $mdb->selectCollection('testCorrect');
$testWrong = $mdb->selectCollection('testWrong');
$testScores = $mdb->selectCollection('testScores');
$notifications= $mdb->selectCollection('notifications');
$sections= $mdb->selectCollection('sections');
$categories= $mdb->selectCollection('categories');

/*$uDetails = array("uid"=>"u1","name"=>"deepak","email"=>"dpk.2391@gmail.com","pwd"=>"123456","gender"=>"m","dob"=>"1991-09-23","mobile"=>"9553778472","group"=>"cse","year"=>"4","college"=>"B.V.R.I.T");
$userDetails->insert($uDetails);
$uDetails = array("uid"=>"u2","name"=>"naresh","email"=>"naresh.chinna07@gmail.com","pwd"=>"123456","gender"=>"m","dob"=>"1990-09-29","mobile"=>"9032353722","group"=>"cse","year"=>"4","college"=>"B.V.R.I.T");
$userDetails->insert($uDetails);
$uDetails = array("uid"=>"u3","name"=>"Chandana","email"=>"chandanapercherla@gmail.com","pwd"=>"123456","gender"=>"f","dob"=>"1992-05-28","mobile"=>"9553725160","group"=>"cse","year"=>"4","college"=>"B.V.R.I.T");
$userDetails->insert($uDetails);
$uDetails = array("uid"=>"u4","name"=>"kavya","email"=>"kavyasalagundla@gmail.com","pwd"=>"123456","gender"=>"f","dob"=>"1991-08-23","mobile"=>"9553774956","group"=>"cse","year"=>"4","college"=>"B.V.R.I.T");
$userDetails->insert($uDetails);*/
//$userDetails->remove();

/*$fDetails = array("fid"=>"f1","name"=>"deepak","email"=>"dpk.2391@gmail.com","pwd"=>"123456","gender"=>"m","dob"=>"1991-09-23","mobile"=>"9553778472","group"=>"cse","subject"=>"tamil","college"=>"B.V.R.I.T");
$facultyDetails->insert($fDetails);
$fDetails = array("fid"=>"f2","name"=>"Naresh","email"=>"naresh.chinna07@gmail.com","pwd"=>"123456","gender"=>"m","dob"=>"1990-09-29","mobile"=>"9032353722","group"=>"cse","subject"=>"c","college"=>"B.V.R.I.T");
$facultyDetails->insert($fDetails);
$fDetails = array("fid"=>"f3","name"=>"Kavya","email"=>"kavyasalagundla@gmail.com","pwd"=>"123456","gender"=>"f","dob"=>"1991-08-23","mobile"=>"9553774956","group"=>"cse","subject"=>"se","college"=>"B.V.R.I.T");
$facultyDetails->insert($fDetails);
$fDetails = array("fid"=>"f4","name"=>"Chandana","email"=>"chandanapercherla@gmail.com","pwd"=>"123456","gender"=>"f","dob"=>"1992-05-28","mobile"=>"9553775160","group"=>"cse","subject"=>"dld","college"=>"B.V.R.I.T");
$facultyDetails->insert($fDetails);
$rDetails = array("rid"=>"r1","name"=>"deepak","email"=>"dpk.2391@gmail.com","pwd"=>"123456","gender"=>"m","mobile"=>"9553778472","college"=>"B.V.R.I.T");
$rootDetails->insert($rDetails);
$rDetails = array("rid"=>"r2","name"=>"naresh","email"=>"naresh.chinna07@gmail.com","pwd"=>"123456","gender"=>"f","mobile"=>"9032353722","college"=>"B.V.R.I.T");
$rootDetails->insert($rDetails);
$rDetails = array("rid"=>"r3","name"=>"kavya","email"=>"kavyasalgundla@gmail.com","pwd"=>"123456","gender"=>"m","mobile"=>"9553774956","college"=>"B.V.R.I.T");
$rootDetails->insert($rDetails);
$rDetails = array("rid"=>"r4","name"=>"chandana","email"=>"chandanapercherla@gmail.com","pwd"=>"123456","gender"=>"f","mobile"=>"9553775160","college"=>"B.V.R.I.T");
$rootDetails->insert($rDetails);
$ques = array("qid"=>"q1","dqid"=>"1","question"=>"Choose the correct combination","options"=>array("1"=>"Deepak:a","1"=>"Deepak:q","2"=>"Deepak:qw","3"=>"Deepak:fg"),"answer"=>"2","solution"=>"Because you have been renamed very recently as silk after the dirty picture.","section"=>"sec1","category"=>"cat1");
$questions->insert($ques);
$ques = array("qid"=>"q2","dqid"=>"2","question"=>"Choose the correct combination","options"=>array("2"=>"Naresh:b","1"=>"Naresh:w","2"=>"Naresh:we","3"=>"Naresh:df"),"answer"=>"2","solution"=>"Because you have been renamed very recently as silk after the dirty picture.","section"=>"sec2","category"=>"cat2");
$questions->insert($ques);
$ques = array("qid"=>"q3","dqid"=>"3","question"=>"Choose the correct combination","options"=>array("3"=>"chandana:c","1"=>"chandana:e","2"=>"chandana:er","3"=>"Chandana:sd"),"answer"=>"2","solution"=>"Because you have been renamed very recently as silk after the dirty picture.","section"=>"sec3","category"=>"cat3");
$questions->insert($ques);
$ques = array("qid"=>"q4","dqid"=>"4","question"=>"Choose the correct combination","options"=>array("4"=>"Kavya:d","1"=>"Kavya:r","2"=>"Kavya:rt","3"=>"Kavya:as"),"answer"=>"2","solution"=>"Because you have been renamed very recently as silk after the dirty picture.","section"=>"sec4","category"=>"cat4");
$questions->insert($ques);*/
$ques = array("qid"=>"q1","dqid"=>"dq0","question"=>"anandam movie director?","options"=>array("1"=>"trivikram","2"=>"Sreenu vaitla","3"=>"fg","4"=>"qwerty"),"answer"=>"2","solution"=>"Because you have been ","section"=>"sec1","category"=>"cat1");
$questions->insert($ques);
$ques = array("qid"=>"q2","dqid"=>"dq0","question"=>"What is the capital of India?","options"=>array("1"=>"AP","2"=>"UP","3"=>"Delhi","4"=>"qwedsa"),"answer"=>"3","solution"=>"Because you have been","section"=>"sec2","category"=>"cat2");
$questions->insert($ques);
$ques = array("qid"=>"q3","dqid"=>"dq0","question"=>"Which game Sachin plays?","options"=>array("1"=>"cricket","2"=>"football","3"=>"volleyball","4"=>"polo"),"answer"=>"1","solution"=>"Sachin plays cricket","section"=>"sec3","category"=>"cat3");
$questions->insert($ques);
$ques = array("qid"=>"q4","dqid"=>"dq0","question"=>"What is the capital of China?","options"=>array("1"=>"Delhi","2"=>"Beijing","3"=>"New York","4"=>"Hyderabad"),"answer"=>"2","solution"=>"Beijing is the capital of china","section"=>"sec1","category"=>"cat1");
$questions->insert($ques);
$ques = array("qid"=>"q5","dqid"=>"dq0","question"=>"Who invented C?","options"=>array("1"=>"Dennis Richie","2"=>"Charles Babbage","3"=>"Robert","4"=>"Eric"),"answer"=>"1","solution"=>"Dennis Richie invented C","section"=>"sec1","category"=>"cat1");
$questions->insert($ques);
$ques = array("qid"=>"q6","dqid"=>"dq0","question"=>"stores homogenous elements?","options"=>array("1"=>"none of these","2"=>"structure","3"=>"union","4"=>"array"),"answer"=>"4","solution"=>"array is a collection of homogenous elements","section"=>"sec1","category"=>"cat1");
$questions->insert($ques);
$ques = array("qid"=>"q7","dqid"=>"dq0","question"=>"Integer size?","options"=>array("1"=>"3bytes","2"=>"4bytes","3"=>"2bytes","4"=>"1byte"),"answer"=>"3","solution"=>"Integer size is 2bytes","section"=>"sec1","category"=>"cat1");
$questions->insert($ques);
$ques = array("qid"=>"q8","dqid"=>"dq0","question"=>"What is the capital of Australia?","options"=>array("1"=>"Canberra","2"=>"Sydney","3"=>"New York","4"=>"Delhi"),"answer"=>"1","solution"=>"Canberra is the capital of Australia","section"=>"sec1","category"=>"cat1");
$questions->insert($ques);

/*$dataQues = array("dqid"=>"dq1","data"=>"This is the data that has to be displayed to the next group of questions","section"=>"sec1","category"=>"cat1");
$dataQuestions->insert($dataQues);
$dataQues = array("dqid"=>"dq2","data"=>"This is the data that has to be displayed to the next group of questions","section"=>"sec2","category"=>"cat2");
$dataQuestions->insert($dataQues);
$dataQues = array("dqid"=>"dq3","data"=>"This is the data that has to be displayed to the next group of questions","section"=>"sec3","category"=>"cat3");
$dataQuestions->insert($dataQues);
$dataQues = array("dqid"=>"dq4","data"=>"This is the data that has to be displayed to the next group of questions","section"=>"sec4","category"=>"cat4");
$dataQuestions->insert($dataQues);
$sec = array("secid"=>"sec1","secName"=>"verbal","rules"=>"these are the rules for this sections");
$sections->insert($sec);
$sec = array("secid"=>"sec2","secName"=>"Quant","rules"=>"these are the rules for this sections");
$sections->insert($sec);
$sec = array("secid"=>"sec3","secName"=>"logical","rules"=>"these are the rules for this sections");
$sections->insert($sec);
$sec = array("secid"=>"sec4","secName"=>"aptitude","rules"=>"these are the rules for this sections");
$sections->insert($sec);
$cat = array("catid"=>"cat1","catName"=>"synonyms","rules"=>"these are the rules for this category","secid"=>"sec1");
$categories->insert($cat);
$cat = array("catid"=>"cat2","catName"=>"synonyms","rules"=>"these are the rules for this category","secid"=>"sec2");
$categories->insert($cat);
$cat = array("catid"=>"cat3","catName"=>"synonyms","rules"=>"these are the rules for this category","secid"=>"sec3");
$categories->insert($cat);
$cat = array("catid"=>"cat4","catName"=>"synonyms","rules"=>"these are the rules for this category","secid"=>"sec4");
$categories->insert($cat);*/
?>