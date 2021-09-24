<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
var chart = document.getElementById('myChart');
var ctx = chart.getContext('2d');
var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Total Teachers', 'Total Students', 'Students on leave', 'Teachers on Leave'],
        datasets: [{
            data: [{{$data[1]}},{{$data[0]}},{{$data[8]}},{{$data[9]}}],
            //data: [$teachers, $students, $student_leave, $teacher_leave],
           //data: [$dataa['teachers'], $data['students'], $data['student_leave'], $data['teacher_leave']],
            backgroundColor: [
                'rgb(57, 204, 204)',
                'rgb(243, 156, 18)',
                'rgb(221, 75, 57)',
                'rgb(216, 27, 96)',
            ],
        }]
    },
    options: {
        maintainAspectRatio: false,
    }
});
</script>