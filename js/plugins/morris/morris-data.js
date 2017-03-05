// Morris.js Charts sample data for SB Admin template

$(function() {

    // Area Chart
    Morris.Area({
        element: 'morris-area-chart',
        data: [{
            period: '2010 Q1',
            people: null

        }, {
            period: '2010 Q2',
            people: 105

        }, {
            period: '2010 Q3',
            people: 912

        }, {
            period: '2010 Q4',
            people: 1048

        }, {
            period: '2011 Q1',
            people: 3954
        }, {
            period: '2011 Q2',
            people: 2510

        }, {
            period: '2011 Q3',
            people: 1600

        }, {
            period: '2011 Q4',
            people: 5000

        }, {
            period: '2012 Q1',
            people: 4200

        }, {
            period: '2012 Q2',
            people: 5002

        }],
        xkey: 'period',
        ykeys: ['people'],
        labels: ['Visits'],
        pointSize: 2,
        hideHover: 'auto',
        resize: true
    });



});
