

//Biểu đồ thống kê

$(document).ready(function () {
    show();
});

function show(){

    $.post("data.php",
        function (data){
            console.log(data);
            //Tên cột
            var formStatusVar = [];
            //Chiều cao cột
            var total = []; 

            for (var i in data) {
                formStatusVar.push(data[i].Quyen);
                total.push(data[i].size_status);
            }

            var options = {
                legend: {
                    //Ẩn nhãn biểu đồ thì dùng false
                    display: true
                },
                scales: {
                    xAxes: [{
                        // //chiều rộng cột
                        barPercentage: 0.5,
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                
            };

            var myChart = {
                labels: formStatusVar,
                datasets: [
                    {
                        label: 'Thống kê doanh thu',
                        backgroundColor: '#17cbd1',
                        borderColor: '#46d5f1',
                        hoverBackgroundColor: '#0ec2b6',
                        hoverBorderColor: '#42f5ef',
                        data: total
                    }
                ]
            };

            var bar = $("#graph"); 
            var barGraph = new Chart(bar, {
                type: 'bar',
                data: myChart,
                options: options
            });
        });
}