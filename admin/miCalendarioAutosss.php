<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='utf-8' />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.11.3/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.11.3/main.min.css">

<body>
    <div id='calendar'></div>
</body>

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.11.3/locales-all.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.11.3/locales-all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.11.3/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.11.3/main.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',
            timeZone: 'UTC',
            initialView: 'resourceTimelineDay',
            aspectRatio: 1.5,
            headerToolbar: {
                left: 'prev,next',
                center: 'title',
                right: 'resourceTimelineDay,resourceTimelineWeek,resourceTimelineMonth'
            },
            editable: true,
            resourceAreaHeaderContent: 'Rooms',
            resources: 'https://fullcalendar.io/api/demo-feeds/resources.json?with-nesting&with-colors',
            events: 'https://fullcalendar.io/api/demo-feeds/events.json?single-day&for-resource-timeline'
        });

        calendar.render();
    });
</script>

</html>