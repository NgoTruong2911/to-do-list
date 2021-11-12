$(function () {
    $('input[name="daterange"]').daterangepicker({
        opens: 'left'
    }, function (start, end, label) {
        console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
    });

    $('#daterange').on('apply.daterangepicker', function (ev, picker) {
        let host = window.location.hostname;
        let path = window.location.pathname;
        let start_date = picker.startDate.format('YYYY-MM-DD');
        let end_date = picker.endDate.format('YYYY-MM-DD');
        window.location.href = '?start_date=' + start_date + '&end_date=' + end_date;
    });
    let url = new URL(window.location.href);
    let searchParams = new URLSearchParams(url.search);
    let get_start_date = searchParams.get('start_date');
    let get_end_date = searchParams.get('end_date');
    if (get_start_date && get_end_date) {
        $('#daterange').val(get_start_date + ' - ' + get_end_date);
    }
});