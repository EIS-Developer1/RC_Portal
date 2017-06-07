<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Survey Chart v2.0.1</title>
         <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        
        <div class="container">            
            <div class="row">                                                                          
                <div class="col-sm-12">                        	
                    <div class="form-box">
                        <div class="form-top">
	                    <div class="form-top-left">
	                        <h3>Survey Chart</h3>	                       	                        
	                    </div>	                    
	                </div>
                        <div class="form-bottom">			                           
                            <div class="row">
				<div class="col-sm-6 form-group">
                                    <label>Chart</label>
                                    <select id="chart-select" name="chart-select" class="form-control" required>
                                        <option value="">Select</option>
                                        <option value="get_Global_Engagement_Scores_result">Global Engagement Scores</option>
                                        <option value="get_Engagement_Score_result_by_Age">Engagement age</option>
                                        <option value="get_Engagement_Score_result_by_lengthOfService">Engagement by tenure</option>
                                        <option value="get_Engagement_Score_result_by_Gender">Engagement analysis by gender</option>
                                        <option value="get_Engagement_Score_result_by_Category">Engagement by Level / Category</option>
                                        <option value="get_Engagement_Score_result_by_Management_group">Engagement by Management Group</option>
                                    </select>
				</div>
                                <div class="col-sm-3 form-group"><button id="btnDisplayChart" class="btn">Display</button></div>
                            </div><br>                                                                                                                                                                                                                                                                                                                                                
                            <div class="row">
                                <div id="High_chartContainer" style="height: 500px; width: 75%;"></div>
                            </div>                                                                                  
                        </div>                        
                    </div>                        	
                </div>
            </div>                    
        </div>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js">        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>               
        <script src="script/engagementChart.js"></script>
        <script src="http://code.highcharts.com/highcharts.js"></script>
                            
    </body>
                
</html>
