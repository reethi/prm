var gridbordercolor = "#eee";
var tax_data = [
                 { "period": "2011 Q3", "licensed": 3407, "sorned": 660 },
                 { "period": "2011 Q2", "licensed": 3351, "sorned": 629 },
                 { "period": "2011 Q1", "licensed": 3269, "sorned": 618 },
                 { "period": "2010 Q4", "licensed": 3246, "sorned": 661 },
                 { "period": "2009 Q4", "licensed": 3171, "sorned": 676 },
                 { "period": "2008 Q4", "licensed": 3155, "sorned": 681 },
                 { "period": "2007 Q4", "licensed": 3226, "sorned": 620 },
                 { "period": "2006 Q4", "licensed": 3245, "sorned": null },
                 { "period": "2005 Q4", "licensed": 3289, "sorned": null }
];

var InitiateAreaChart = function () {
    return {
        init: function () {
            Morris.Area({
                element: 'area-chart',
                data: [
                  { period: '2010 Q1', iphone: 2666, ipad: null, itouch: 2647 },
                  { period: '2010 Q2', iphone: 2778, ipad: 2294, itouch: 2441 },
                  { period: '2010 Q3', iphone: 4912, ipad: 1969, itouch: 2501 },
                  { period: '2010 Q4', iphone: 3767, ipad: 3597, itouch: 5689 },
                  { period: '2011 Q1', iphone: 6810, ipad: 1914, itouch: 2293 },
                  { period: '2011 Q2', iphone: 5670, ipad: 4293, itouch: 1881 },
                  { period: '2011 Q3', iphone: 4820, ipad: 3795, itouch: 1588 },
                  { period: '2011 Q4', iphone: 15073, ipad: 5967, itouch: 5175 },
                  { period: '2012 Q1', iphone: 10687, ipad: 4460, itouch: 2028 },
                  { period: '2012 Q2', iphone: 8432, ipad: 5713, itouch: 1791 }
                ],
                xkey: 'period',
                ykeys: ['iphone', 'ipad', 'itouch'],
                labels: ['iPhone', 'iPad', 'iPod Touch'],
                pointSize: 2,
                hideHover: 'auto',
                lineColors: [themethirdcolor, themesecondary, themeprimary]
            });
        }
    };
}();

var InitiateAreaChart1 = function () {
    return {
        init: function () {
            Morris.Area({
                element: 'area-chart1',
                data: [
                  { period: '2015-01-01', netchange: 0},
                  { period: '2015-01-02', netchange: 2},
                  { period: '2015-01-03', netchange: 2.25},
                  { period: '2015-01-04', netchange: -2.25},
                  { period: '2015-01-05', netchange: 6.75},
                  { period: '2015-01-06', netchange: -5.75},
                  { period: '2015-01-07', netchange: 1},
                  { period: '2015-01-09', netchange: 0.25},
                  { period: '2015-01-10', netchange: -1},
                  { period: '2015-01-11', netchange: 0.75},
                  { period: '2015-01-12', netchange: 0},
                  { period: '2015-01-13', netchange: 0.75},
                  { period: '2015-01-14', netchange: -3.7},
                  { period: '2015-01-15', netchange: -4.3},
                  { period: '2015-01-16', netchange: 4},
                  { period: '2015-01-17', netchange: 0.5},
                  { period: '2015-01-18', netchange: -9},
                  { period: '2015-01-19', netchange: 4.2},
                  { period: '2015-01-20', netchange: 0},
                  { period: '2015-01-21', netchange: -3}
                  
                  
                ],
                xkey: 'period',
                ykeys: ['netchange'],
                labels: ['Weight Change'],
                pointSize: 2,
                hideHover: 'auto',
                lineColors: [themethirdcolor, themesecondary, themeprimary]
            });
        }
    };
}();

var InitiateLineChart = function () {
    return {
        init: function () {
            Morris.Line({
                element: 'line-chart',
                data: [
                  { period: '2015-01-01', netchange: 0},
                  { period: '2015-01-02', netchange: 4.64},
                  { period: '2015-01-03', netchange: 2.51},
                  { period: '2015-01-04', netchange: -0.06},
                  { period: '2015-01-05', netchange: 2.26},
                  { period: '2015-01-06', netchange: 2.33},
                  { period: '2015-01-07', netchange: 0.77},
                  { period: '2015-01-08', netchange: 2.75},
                  { period: '2015-01-09', netchange: -0.44},
                  { period: '2015-01-10', netchange: 3.64},
                  { period: '2015-01-11', netchange: 0.82},
                  { period: '2015-01-12', netchange: -1.18},
                  { period: '2015-01-13', netchange: 4.52},
                  { period: '2015-01-14', netchange: -1.73},
                  { period: '2015-01-15', netchange: 0.65},
                  { period: '2015-01-16', netchange: 8.91},
                  { period: '2015-01-17', netchange: -6.76},
                  { period: '2015-01-18', netchange: 5.17},
                  { period: '2015-01-19', netchange: -2.03},
                  { period: '2015-01-20', netchange: -1.04},
                  { period: '2015-01-21', netchange: 3.85}
                ],
                xkey: 'period',
                ykeys: ['netchange'],
                labels: ['Weight Lost'],
                lineColors: ['#36cceb', '#ffd261']
            });

        }
    };
}();

var InitiateLineChart2 = function () {
    return {
        init: function () {
            Morris.Line({
                element: 'line-chart-2',
                data: [
                  { period: '2015-01-01', attendance: 77},
                  { period: '2015-01-02', attendance: 77},
                  { period: '2015-01-03', attendance: 76},
                  { period: '2015-01-04', attendance: 74},
                  { period: '2015-01-05', attendance: 76},
                  { period: '2015-01-06', attendance: 71},
                  { period: '2015-01-07', attendance: 74},
                  { period: '2015-01-08', attendance: 71},
                  { period: '2015-01-09', attendance: 68},
                  { period: '2015-01-10', attendance: 68},
                  { period: '2015-01-11', attendance: 57},
                  { period: '2015-01-12', attendance: 58},
                  { period: '2015-01-13', attendance: 54},
                  { period: '2015-01-14', attendance: 52},
                  { period: '2015-01-15', attendance: 51},
                  { period: '2015-01-16', attendance: 45},
                  { period: '2015-01-17', attendance: 43},
                  { period: '2015-01-18', attendance: 41},
                  { period: '2015-01-19', attendance: 37},
                  { period: '2015-01-20', attendance: 42},
                  { period: '2015-01-21', attendance: 38}
                ],
                xkey: 'period',
                ykeys: ['attendance'],
                labels: ['Attendance'],
                lineColors: ['#36cceb', '#ffd261']
            });

        }
    };
}();

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
                barColors: ['#36cceb', '#fa795c', '#ffd261']
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
                barColors: ['#36cceb', '#fa795c', '#ffd261']
            });
        }
    };
}();

var InitiateclassparticipantListTable = function () {
return {
      init: function () {
      //Datatable Initiating
      var oTable = $('#your_class_participants_list').dataTable({
        "sDom": "Tflt<'row DTTTFooter'<'col-sm-6'i><'col-sm-12'p>>",
        "iDisplayLength": 10,
        "oTableTools": {
        "aButtons": [
         "csv", "xls", "pdf", "print"
        ],
        "sSwfPath": "../../../assets/beyondadmin/swf/copy_csv_xls_pdf.swf"
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
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null
      ],
      "aaSorting": []
      });
      //Check All Functionality
      jQuery('#your_class_participants_list .group-checkable').change(function () {
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
      //jQuery('#your_class_participants_list_length').remove();
}
};
}();


var InitiateAttendanceTable = function () {
return {
      init: function () {
      //Datatable Initiating
      var oTable = $('#attendance_list').dataTable({
        "sDom": "Tflt<'row DTTTFooter'<'col-sm-12'p>>",
        "oTableTools": {
        "aButtons": [],
        "sSwfPath": "../../assets/beyondadmin/swf/copy_csv_xls_pdf.swf"
        },
        "language": {
        "search": "",
        "sLengthMenu": "",
        "sPaginationType": "full_numbers"
        },
        "aoColumns": [
            null,
            null,
            null
      ],
      "aaSorting": []
      });
      $('#attendance_list_length').css("display","none");
}
};
    
}();

var InitiateClassListTable = function () {
return {
      init: function () {
      //Datatable Initiating
      var oTable = $('#your_class_list').dataTable({
        "sDom": "Tflt<'row DTTTFooter'<'col-sm-12'p>>",
        "oTableTools": {
        "aButtons": [],
        "sSwfPath": "../../assets/beyondadmin/swf/copy_csv_xls_pdf.swf"
        },
        "language": {
        "search": "",
        "sLengthMenu": "",
        "sPaginationType": "full_numbers"
        },
        "aoColumns": [
            null,
            null,
            null
      ],
      "aaSorting": []
      });
      $('#your_class_list_length').css("display","none");
}
};
    
}();


var InitiateParticipntaListTable = function () {
return {
      init: function () {
      //Datatable Initiating
      var oTable = $('#your_participants_list').dataTable({
        "sDom": "Tflt<'row DTTTFooter'<'col-sm-12'p>>",
        "oTableTools": {
       // "aButtons": ["copy", "csv", "xls", "pdf", "print"],
       // "sSwfPath": "../../../assets/beyondadmin/swf/copy_csv_xls_pdf.swf"
        },
        "language": {
        "search": "",
        "sLengthMenu": "",
        "sPaginationType": "full_numbers"
        },
        "aoColumns": [
            null,
            null,
            null
      ],
      "aaSorting": []
      });
      $('#your_participants_list_length').css("display","none");
}
};
    
}();
var InitiatesubmitAttendanceListTable = function () {
  //alert('hi');
return {
      init: function () {
      //Datatable Initiating
      var oTable = $('#attendance_list').dataTable({
        "sDom": "Tflt<'row DTTTFooter'<'col-sm-12'p>>",
        "oTableTools": {
        "aButtons": ["copy", "csv", "xls", "pdf", "print"],
        "sSwfPath": "../../../assets/beyondadmin/swf/copy_csv_xls_pdf.swf"
        },
        "language": {
        "search": "",
        "sLengthMenu": "",
        "sPaginationType": "full_numbers"
        },
        "aoColumns": [
            null,
            null,
            null
      ],
      "aaSorting": []
      });
}
};
    
}();
var InitiateClassAttendanceListTable = function () {
  //alert('hi');
return {
      init: function () {
      //Datatable Initiating
      var oTable = $('#ClassAttendanceList').dataTable({
        "sDom": "Tflt<'row DTTTFooter'<'col-sm-12'p>>",
        "oTableTools": {
        "aButtons": ["copy", "csv", "xls", "pdf", "print"],
        "sSwfPath": "../../../assets/beyondadmin/swf/copy_csv_xls_pdf.swf"
        },
        "language": {
        "search": "",
        "sLengthMenu": "",
        "sPaginationType": "full_numbers"
        },
        "aoColumns": [
            null,
            null,
            null,
            null
      ],
      "aaSorting": []
      });
}
};
    
}();
var InitiatedocsListTable = function () {
  //alert('hi');
return {
      init: function () {
      //Datatable Initiating
      var oTable = $('#docslist').dataTable({
        "sDom": "Tflt<'row DTTTFooter'<'col-sm-12'p>>",
        "oTableTools": {
        "aButtons": ["copy", "csv", "xls", "pdf", "print"],
        "sSwfPath": "../../../assets/beyondadmin/swf/copy_csv_xls_pdf.swf"
        },
        "language": {
        "search": "",
        "sLengthMenu": "",
        "sPaginationType": "full_numbers"
        },
        "aoColumns": [
            null,
            null,
            null,
            null,
            null
      ],
      "aaSorting": []
      });
}
};
    
}();
var InitiatevideosListTable = function () {
  //alert('hi');
return {
      init: function () {
      //Datatable Initiating
      var oTable = $('#videoslist').dataTable({
        "sDom": "Tflt<'row DTTTFooter'<'col-sm-12'p>>",
        "oTableTools": {
        "aButtons": ["copy", "csv", "xls", "pdf", "print"],
        "sSwfPath": "../../../assets/beyondadmin/swf/copy_csv_xls_pdf.swf"
        },
        "language": {
        "search": "",
        "sLengthMenu": "",
        "sPaginationType": "full_numbers"
        },
        "aoColumns": [
            null,
            null,
            null,
            null,
            null
      ],
      "aaSorting": []
      });
}
};
    
}();