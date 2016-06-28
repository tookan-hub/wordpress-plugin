/*

SAMPLE - FOR CREATING A TASK

*/

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

<script type="text/javascript">

$(document).ready(function() {

    $("input#test_job").click(function(event) {

       var job_id = jQuery("input#job_id").val();

    jQuery.ajax({
        type: 'post',
        url:'http://localhost:8888/tookan/wp-content/plugins/tookan_task_api/get_task_details.php',
        // UPDATE THIS PATH AS PER YOUR WEBSITE.
        data: {
            job_id: job_id,
            type : "pickup_task"  // for creating a pick up task
            //type : "delivery_task" // for creating a delivery up task
            //type : "pickup_and_delivery_task" // for creating a pick up and delivery task
            //type : "appionment" -- this is also the default option. // for creating an appointment task
            },
        dataType: 'JSON',
        success: function(data) {
            console.log(data);
            console.log(data['message']);
        },
    });
    return true;

    });


});

</script>



/**************************************************************************************/

/*

SAMPLE - FOR QUERYING THE TASK DETAILS.

*/

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

<script type="text/javascript">

$(document).ready(function() {

    $("input#test_job").click(function(event) {

       var job_id = jQuery("input#job_id").val();

    jQuery.ajax({
        type: 'post',
        url:'http://localhost:8888/tookan/wp-content/plugins/tookan_task_api/get_task_details.php',
        // UPDATE THIS PATH AS PER YOUR WEBSITE.
        data: {
            job_id: job_id
            },
        dataType: 'JSON',
        success: function(data) {
            console.log(data);
            console.log(data['message']);
        },
    });
    return true;

    });


});

</script>

/**************************************************************************************/

/*

SAMPLE - FOR DELETING A TASK

*/
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

<script type="text/javascript">

$(document).ready(function() {

    $("input#test_job").click(function(event) {

       var job_id = jQuery("input#job_id").val();

    jQuery.ajax({
        type: 'post',
        url:'http://localhost:8888/tookan/wp-content/plugins/tookan_task_api/get_task_details.php',
        // UPDATE THIS PATH AS PER YOUR WEBSITE.
        data: {
            job_id: job_id
            },
        dataType: 'JSON',
        success: function(data) {
            console.log(data);
            console.log(data['message']);
        },
    });
    return true;

    });


});
</script>
