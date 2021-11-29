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
            var total2 = []; 
            var total3 = []; 

            for (var i in data) {
                formStatusVar.push(data[i].Quyen);
                total.push(data[i].size_status);
                total2.push(data[i].size_status2);
                total3.push(data[i].size_status3);
            }

            var options = {
                legend: {
                    //Ẩn nhãn biểu đồ thì dùng false
                    display: true
                },
                scales: {
                    xAxes: [{
                        //chiều rộng cột
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
                        label: 'Tổng doanh thu',
                        backgroundColor: '#17cbd1',
                        borderColor: '#46d5f1',
                        hoverBackgroundColor: '#0ec2b6',
                        hoverBorderColor: '#42f5ef',
                        data: total
                    },
                    {
                        label: 'Thống kê phụ kiện',
                        backgroundColor: '#FE0066',
                        borderColor: '#FE0066',
                        hoverBackgroundColor: '#FE0098',
                        hoverBorderColor: '#FE0098',
                        data: total2
                    },
                    {
                        label: 'Thống kê điện thoại',
                        backgroundColor: '#f4791f',
                        borderColor: '#f4791f',
                        hoverBackgroundColor: '#f12711',
                        hoverBorderColor: '#f12711',
                        data: total3
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