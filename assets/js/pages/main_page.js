$( function () {

  $('#login-form').on('submit', function (e) {
    e.preventDefault();

    if ($('#user_name').val() == '' || $('#user_pass').val() == '') {
      alert('Lengkapi data!');
      return;
  }

  var data = new FormData(this);

  $.ajax({
      url : base_url + 'site/signin',
      type : "POST",
      dataType : "JSON",
      cache : false,
      contentType : false,
      processData : false,
      data : data,
      success : function (data) {
        if (data.type == 'done') {
          Swal.fire('Success', data.msg, "success").then(function () {
            window.location.reload();
        });
      }else{
          Swal.fire('Failed !', data.msg, "error");
      }
  }
});

});

    //Get the context of the Chart canvas element we want to select
    var ctx = $("#chart-bar");

    // Chart Options
    var chartOptions = {
        // Elements options apply to all of the options unless overridden in a dataset
        // In this case, we are setting the border of each horizontal bar to be 2px wide and green
        elements: {
        	rectangle: {
        		borderWidth: 2,
        		borderColor: 'rgb(0, 255, 0)',
        		borderSkipped: 'left'
        	}
        },
        responsive: true,
        maintainAspectRatio: false,
        responsiveAnimationDuration:500,
        legend: {
        	position: 'top',
            labels : {
                fontColor : 'white',
                fontSize : 18
            }
        },
        scales: {
        	xAxes: [{
        		display: true,
        		gridLines: {
        			color: "transparent",
        			drawTicks: true,
        		},
        		scaleLabel: {
        			display: false,
        		},
                ticks : {
                    fontColor : 'white',
                    fontSize : 14,
                }
            }],
            yAxes: [{
              display: true,
              gridLines: {
                 color: "transparent",
                 drawTicks: true,
             },
             scaleLabel: {
                 display: false,
             },
             ticks : {
                fontColor : 'white',
                fontSize : 14,
                beginAtZero : true,
                lineHeight : 2.5
            }
        }]
    },
    title: {
       display: false,
   }
};

$.ajax({
   url : base_url + 'site/get_data_chart',
   type : 'POST',
   dataType : 'JSON',
   success : function (data) {
      if ( data.type == 'done') {

         var chartData = {
            labels: data.msg.labels,
            datasets: [{
               label: "Tercapai",
               data: data.msg.data,
               backgroundColor: "rgb(102, 255, 51)",
               hoverBackgroundColor: "rgba(40,208,148,.9)",
               borderColor: "transparent",
               barThickness : 60,
           }]
       };

       var config = {
        type: 'bar',
        options : chartOptions,
        data : chartData
    };

    var lineChart = new Chart(ctx, config);
}
}
});


$.ajax({
   url : base_url + 'site/get_progress_level_1',
   type : 'POST',
   dataType : 'JSON',
   data : {'level1_id' : $('#level1_id').text()},
   success : function (data) {
      if ( data.type == 'done') {
         for (var i = 0; i < data.msg.length; i++) {

            var chart = new Chart( $('#chart-doughnut-'+data.msg[i].id), {
               type : 'doughnut',
               data : {
                  datasets	: [{
                     data : [data.msg[i].level1_progress, 100-data.msg[i].level1_progress],
                     backgroundColor : ['rgb(102, 255, 51)', 'rgb(255, 255, 0)'],
                     borderWidth : 1
                 }],
                 labels 		: ['Tercapai : '+data.msg[i].level1_progress+'%'],
             },
             options : {
              tooltips : {
                 enabled : false
             },
             legend : {
                position : 'bottom',
                fontSize : 14
            }
        }
    });

        }
    }
}
});
});