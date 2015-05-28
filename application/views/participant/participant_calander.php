<div class="col-lg-12 col-md-10 col-sm-12 col-xs-12">&nbsp;</div>
<div class="col-lg-1 col-md-10 col-sm-12 col-xs-12">&nbsp;</div>
<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
    <div class="widget">
        <div class="widget-header bg-prm">
            <span class="widget-caption"><strong>Calendar</strong></span>
            <span class="widget-subcaption"><strong>View Full Calendar</strong></span>
        </div>
        <div class="widget-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="col-lg-12">
                        <h6 style="color:#ccc;">UPCOMING APPOINTMENTS</h6>
                        <div>
                            <div class="upcoming_appointments">Monday, December 3rd @ 3:30pm</div>
                            <p>You have a clinic visit scheduled. Please remember to fast 12 hours before!</p>
                        </div>
                        <div>
                            <div class="upcoming_appointments">Wednesday, November 23rd</div>
                            <p>You have an appointment for a dietary call.</p>
                        </div>
                        <div>
                            <div class="upcoming_appointments">Monday, December 3rd @ 3:30pm</div>
                            <p>You have a clinic visit scheduled. Please remember to fast 12 hours before!</p>
                        </div>
                        <div>
                            <div class="upcoming_appointments">Monday, December 3rd @ 3:30pm</div>
                            <p>You have a clinic visit scheduled. Please remember to fast 12 hours before!</p>
                        </div>
                        <div>
                            <div class="upcoming_appointments">Tuesday, December 2nd @ 4:30pm</div>
                            <p>You have a class scheculed today!</p>
                        </div>
                        <div>&nbsp;</div>
                        <div>
                            <a class="btn yes_button">Create Appointment</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 table-responsive">
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url();?>assets/beyondadmin/js/jquery-ui-1.10.4.custom.js"></script>
<script src="<?php echo base_url();?>assets/beyondadmin/js/fullcalendar/fullcalendar.js"></script>
<script>
    $(document).ready(function () {
        $('#external-events div.external-event').each(function () {
            var eventObject = {
                title: $.trim($(this).text())
            };
            $(this).data('eventObject', eventObject);
            $(this).draggable({
                zIndex: 999,
                revert: true,
                revertDuration: 0
            });

        });
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();

        $('#calendar').fullCalendar({
            header: {
                right: 'month,agendaWeek,agendaDay prev,next',
                left: 'title'
            },
            editable: true,
            buttonText: {
                prev: '<i class="fa fa-chevron-left"></i>',
                next: '<i class="fa fa-chevron-right"></i>',
                today: 'Today',
                month: 'Month',
                week: 'Week',
                day: 'Day'
            },
            droppable: true,
            drop: function (date, allDay) {

                var originalEventObject = $(this).data('eventObject');

                var copiedEventObject = $.extend({}, originalEventObject);

                copiedEventObject.start = date;
                copiedEventObject.allDay = allDay;

                $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

                if ($('#drop-remove').is(':checked')) {
                    $(this).remove();
                }

            },
            events: [
                            {
                                title: 'All Day Event',
                                start: new Date(y, m, 1),
                                textColor: '#5db2ff',
                                borderColor: '#5db2ff'
                            },
                            {
                                title: 'Long Event',
                                start: new Date(y, m, d - 5),
                                end: new Date(y, m, d - 2),
                                borderColor: '#a0d468'
                            },
                            {
                                id: 999,
                                title: 'Repeating Event',
                                start: new Date(y, m, d - 3, 16, 0),
                                allDay: false,
                                borderColor: '#ffce55'

                            },
                            {
                                id: 999,
                                title: 'Repeating Event',
                                start: new Date(y, m, d + 4, 16, 0),
                                allDay: false,
                                borderColor: '#fb6e52'
                            },
                            {
                                title: 'Meeting',
                                start: new Date(y, m, d, 10, 30),
                                allDay: false,
                                borderColor: '#e75b8d'
                            }
            ,
                            {
                                title: 'Awesome Plan',
                                start: new Date(y, m, d - 17, 2, 20),
                                end: new Date(y, m, d - 14, 14, 0),
                                allDay: false,
                                borderColor: '#a0d468'
                            },
                            {
                                title: 'Lunch',
                                start: new Date(y, m, d, 12, 0),
                                end: new Date(y, m, d, 14, 0),
                                allDay: false,
                                borderColor: '#2dc3e8'
                            },
                            {
                                title: 'Birthday Party',
                                start: new Date(y, m, d + 1, 19, 0),
                                end: new Date(y, m, d + 1, 22, 30),
                                allDay: false,
                                borderColor: '#ed4e2a'
                            },
                            {
                                title: 'Click for Google',
                                start: new Date(y, m, 28),
                                end: new Date(y, m, 29),
                                url: 'http://google.com/'
                            }
            ]
        });


    });
    $('.fc-button-content').each(function () {
    });
</script>
