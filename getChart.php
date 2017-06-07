<?php
/*Database connection*/
$db = new mysqli('localhost:3306','root','admin', 'hrsurvey2');
//$db = new mysqli('10.2.37.68:3306','surveydev','Pa55w0rd', 'hrsurvey2');
if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$db->set_charset("utf8");

$sql;
$response;
$spCall = filter_input_array(INPUT_POST)['actionToPerform'];

/*GET SEARCH PARAMETERS*/
$survey_id = filter_input_array(INPUT_POST)['survey_id'];
$sector = filter_input_array(INPUT_POST)['sector'];
$company = filter_input_array(INPUT_POST)['company'];
$department = filter_input_array(INPUT_POST)['department'];
$sub_department = filter_input_array(INPUT_POST)['sub_department'];
$country = filter_input_array(INPUT_POST)['country'];
$job_category = filter_input_array(INPUT_POST)['job_category'];
$management_group = filter_input_array(INPUT_POST)['management_group'];
$gender = filter_input_array(INPUT_POST)['gender'];
$age_catgory = filter_input_array(INPUT_POST)['age_catgory'];
$years_of_experience = filter_input_array(INPUT_POST)['years_of_experience'];

$data = array();

$sql = "CALL " . $spCall . "(" . $survey_id . "," 
                               . $sector . "," 
                               . $company . "," 
                               . $department . "," 
                               . $sub_department . "," 
                               . $country . "," 
                               . $job_category . "," 
                               . $management_group . "," 
                               . $gender . "," 
                               . $age_catgory . "," 
                               . $years_of_experience . ")";        
if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}
        
while($row = $result->fetch_assoc()){   
    $row_data = array(
        'responseName' => $row['responseName'],
        'Destructive' => $row['Destructive'], 
        'Serious' => $row['Serious'],
        'Indifferent' => $row['Indifferent'],
        'HighPerformance' => $row['HighPerformance'],
        'no_of_response' => $row['no_of_response'],
        'total_response' => $row['total_response']
    );
    array_push($data, $row_data);
}

$response = json_encode($data); 

$db->close();
echo $response;
exit();