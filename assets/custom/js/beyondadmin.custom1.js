var gridbordercolor = "#eee";

var InitiateBarChartWeight = function () {
    return {
        init: function () {
            Morris.Bar({
                element: 'bar-chart',
                data: [
                  { y: '2006', a: 10, b: 90, c:80 },
                  { y: '2007', a: 75, b: 65 , c:25},
                  { y: '2008', a: 50, b: 40 , c:90},
                  { y: '2009', a: 75, b: 65 , c:15},
                  { y: '2010', a: 50, b: 40 , c:50},
                  { y: '2011', a: 75, b: 65 ,c:10},
                  { y: '2012', a: 100, b: 90 ,c:90}
                ],
                xkey: 'y',
                ykeys: ['a', 'b', 'c'],
                labels: ['Series A', 'Series B', 'Series C'],
                hideHover: 'auto',
                barColors: ['yellow', 'brown', 'red']
            });
        }
    };
}();

var InitiateBarChartAttendance = function () {
    return {
        init: function () {
            Morris.Bar({
                element: 'bar-chart-2',
                data: [
                  { y: '2006', a: 15, b: 90, c:80 },
                  { y: '2007', a: 75, b: 65 , c:25},
                  { y: '2008', a: 50, b: 40 , c:90},
                  { y: '2009', a: 75, b: 65 , c:15},
                  { y: '2010', a: 50, b: 40 , c:50},
                  { y: '2011', a: 75, b: 65 ,c:10},
                  { y: '2012', a: 100, b: 90 ,c:90}
                ],
                xkey: 'y',
                ykeys: ['a', 'b', 'c'],
                labels: ['Series A', 'Series B', 'Series C'],
                hideHover: 'auto',
                barColors: ['#0098DB', 'red', 'green']
            });
        }
    };
}();


//for class list table in dashboard
var InitiateClassListTable = function () {
    return {
        init: function () {
            //Datatable Initiating
            var oTable = $('#your_class_list').dataTable({
                "sDom": "Tflt<'row DTTTFooter'>",
                "iDisplayLength": 5,
                "oTableTools": {
                    "aButtons": [
                        
                    ],
                    "sSwfPath": "assets/swf/copy_csv_xls_pdf.swf"
                },
                "language": {
                    "search": "",
                    "sLengthMenu": "_MENU_",
                    "oPaginate": {
                        "sPrevious": "Prev",
                        "sNext": "Next"
                    }
                },
                "aoColumns": [
                  { "bSortable": false },
                  null,
                  { "bSortable": false },
                  null,
                  { "bSortable": false }
                ],
                "aaSorting": []
            });

            //Check All Functionality
            jQuery('#your_class_list .group-checkable').change(function () {
                var set = $(".checkboxes");
                var checked = jQuery(this).is(":checked");
                jQuery(set).each(function () {
                    if (checked) {
                        $(this).prop("checked", true);
                        $(this).parents('tr').addClass("active");
                    } else {
                        $(this).prop("checked", false);
                        $(this).parents('tr').removeClass("active");
                    }
                });

            });
            jQuery('#your_class_list tbody tr .checkboxes').change(function () {
                $(this).parents('tr').toggleClass("active");
            });

        }

    };

}();

var InitiateParticipntaListTable = function () {
    return {
        init: function () {
            //Datatable Initiating
            var oTable = $('#your_participants_list').dataTable({
                "sDom": "Tflt<'row DTTTFooter'<'col-sm-8'p>>",
                "iDisplayLength": 5,
                "oTableTools": {
                    "aButtons": [
                        "copy", "csv", "xls", "pdf", "print"
                    ],
                    "sSwfPath": "assets/swf/copy_csv_xls_pdf.swf"
                },
                "language": {
                    "search": "",
                    "sLengthMenu": "_MENU_",
                    "oPaginate": {
                        "sPrevious": "Prev",
                        "sNext": "Next"
                    }
                },
                "aoColumns": [
                  { "bSortable": false },
                  null,
                  { "bSortable": false },
                  null,
                  { "bSortable": false }
                ],
                "aaSorting": []
            });

            //Check All Functionality
            jQuery('#your_participants_list .group-checkable').change(function () {
                var set = $(".checkboxes");
                var checked = jQuery(this).is(":checked");
                jQuery(set).each(function () {
                    if (checked) {
                        $(this).prop("checked", true);
                        $(this).parents('tr').addClass("active");
                    } else {
                        $(this).prop("checked", false);
                        $(this).parents('tr').removeClass("active");
                    }
                });

            });
            jQuery('#your_participants_list tbody tr .checkboxes').change(function () {
                $(this).parents('tr').toggleClass("active");
            });

        }

    };

}();