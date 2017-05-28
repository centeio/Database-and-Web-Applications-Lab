// Morris.js Charts sample data for SB Admin template


$(function() {
    console.log("test");
    $.post("/~lbaw1611/final/api/get_logs_data.php", {}, function(data) {
        //console.log(data);

        // Area Chart
        Morris.Area({
            element: 'morris-area-chart',
            data: data,
            xkey: 'period',
            ykeys: ['people'],
            labels: ['Visits'],
            pointSize: 2,
            hideHover: 'auto',
            resize: true
        });

    }, 'json').error(function(event, jqxhr, settings) {
        console.log(event);
        console.log(jqxhr);
        console.log(settings);
    });





});