var chart;
var dataResult;
var destructive_data_point;
var serious_data_point;
var indifferent_data_point;
var highPerformance_data_point;

var high_Chart_BarChart_Categories;

$("#btnDisplayChart").click(function(){          
    getDataResult($('#chart-select').val());
    display_Global_Engagement_Scores_chart($("#chart-select option:selected").text());
    //display_High_Chart($("#chart-select option:selected").text());
});

function getDataResult(action){

    $.ajax({ 
        type: "POST",                
        url: "getChart.php",
        data: {
            actionToPerform: action
            ,survey_id: 1
            ,sector: "\"('Chemical Arm 1 - BC')\""
            ,company: "\"('Coolkote Enterprise Ltd')\"" 
            ,department: "\"('Administration/Finance/Sales/Store')\"" 
            ,sub_department: "\"''\"" 
            ,country: "\"('Comoros', 'Mauritius')\""
            ,job_category: "\"''\"" 
            ,management_group: "\"''\"" 
            ,gender: "\"('Male', 'Female')\""
            ,age_catgory: "\"''\""
            ,years_of_experience: "\"''\""
        },
        async: false,
        success : function(result)
        {                                         
            dataResult = JSON.parse(result);                         
        }
    });
    return false;
}

function display_Global_Engagement_Scores_chart(chartName){
    
    high_Chart_BarChart_Categories = [];
        
    destructive_data_point = [];
    serious_data_point = [];
    indifferent_data_point = [];
    highPerformance_data_point = [];
    
    for(x=0; x<dataResult.length; x++){        
        set_data_point('Destructive', parseInt(dataResult[x].Destructive));
        set_data_point('HighPerformance', parseInt(dataResult[x].HighPerformance));
        set_data_point('Indifferent', parseInt(dataResult[x].Indifferent));
        set_data_point('Serious', parseInt(dataResult[x].Serious));                             
        high_Chart_BarChart_Categories.push('\"' + dataResult[x].responseName + '\"');        
    }

    $('#High_chartContainer').highcharts({
        chart: {
                type: 'bar'
            },
            title: {
                text: chartName
            },
            xAxis: {
                categories: high_Chart_BarChart_Categories,
                title: {
                    text: null
                }
            },
            yAxis: {
                title: {
                    text: '%'
                }
            },
            tooltip: {
                valueSuffix: ' %'
            },
            plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        series: 
        [
            {
                name: 'Destructive',
                color: "#8A0808",
                data: destructive_data_point
            }, 
            {
                name: 'Serious',
                color: "#E74C3C",
                data: serious_data_point
            }, 
            {
                name: "Indifferent",
                color: "#F7DC6F",
                data: indifferent_data_point
            }, 
            {
                name: 'High Performance',
                color: "#2ECC71",
                data: highPerformance_data_point
            }
        ],
    });        
}

function set_data_point(data_point, data_point_value){
                 
    if(data_point === 'Destructive'){                 
        destructive_data_point.push(data_point_value);
    }
    
    if(data_point === 'HighPerformance'){                 
        highPerformance_data_point.push(data_point_value);
    } 
    
    if(data_point === 'Indifferent'){                 
        indifferent_data_point.push(data_point_value);
    }
    
    if(data_point === 'Serious'){                 
        serious_data_point.push(data_point_value);
    }    
}