<!-- <div class="content-wrapper">
<section class="notices">
    <span>Visitors Today : 11</span>
    <span>Products Sold : 3</span>
    <span>Date : 2020/4/5</span>


</section>
<section >
    <div class="cards">
        <div class="card card--1"></div>
        <div class="card card--2"></div>
        <div class="card card--3"></div>
        <div class="card card--4"></div>
    </div>
</section>
</div> -->

<div class="content-wrapper">
     <div class="row-1">
          <div class="heading">
               <h1 class="heading__primary--main">Dashboard</h1>
               <h3 class="heading__primary--sub">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. In consequatur tempora eaque impedit optio fugit?
               </h3>
          </div>
     </div>
     <div class="row-2">
          <div class="canvas canvas__line">
               <canvas id="myChart" class="myChart"></canvas>
          </div>
          <div class="canvas canvas__doughnut">
               <canvas id="myPie" class="myPie myChart"></canvas>
          </div>
     </div>

     <script>
          var ctx = document.getElementById("myChart");
          var myChart = new Chart(ctx, {
               type: "line",
               data: {
                    labels: ["Jan", "feb", "March", "April", "May", "June", "July", "August", "Sept", "Oct", "Nov", "Dec"],
                    datasets: [
                         {
                              label: "No.of visitors(2020)",
                              fill: false,
                              lineTension: 0,
                              data: [12, 19, 3, 5, 2, 3, 6, 1, 5, 100],
                              borderWidth: 3,
                              borderColor: "rgba(255,255,255,0.5)",
                              borderCapStyle: "butt",
                              number: [20, 10, 30, 40],
                              pointBackgroundColor: "rgba(255,255,255,0.5)",
                              borderColor: ["#fc5185"],
                              hoverBackgroundColor: "rgba(232,105,90,0.8)",
                              // backgroundColor: [
                              //     'rgba(255, 99, 132, 0.2)',
                              //     'rgba(54, 162, 235, 0.2)',
                              //     'rgba(255, 206, 86, 0.2)',
                              //     'rgba(75, 192, 192, 0.2)',
                              //     'rgba(153, 102, 255, 0.2)',
                              //     'rgba(255, 159, 64, 0.2)'
                              // ],
                              borderColor: [
                                   "rgba(255, 99, 132, 1)",
                                   "rgba(54, 162, 235, 1)",
                                   "rgba(255, 206, 86, 1)",
                                   "rgba(75, 192, 192, 1)",
                                   "rgba(153, 102, 255, 1)",
                                   "rgba(255, 159, 64, 1)"
                              ]
                         }
                    ]
               },
               options: {
                    scales: {
                         yAxes: [
                              {
                                   stacked: true,
                                   ticks: {
                                        max: 200,
                                        min: 0,
                                        stepSize: 10,
                                        beginAtZero: true,
                                        fontColor: "white",
                                        fontSize: 14.5
                                   }
                              }
                         ],
                         xAxes: [
                              {
                                   ticks: {
                                        fontColor: "white",
                                        fontSize: 14.5,
                                        stepSize: 1,
                                        beginAtZero: true
                                   }
                              }
                         ]
                    },
                    legend: {
                         display: true,
                         position: "bottom",
                         labels: {
                              // This more specific font property overrides the global property
                              fontColor: "white",
                              fontSize: 25
                         }
                    }
               }
          });
     </script>

     <script>
          var ctx = document.getElementById("myPie");
          var myChart = new Chart(ctx, {
               type: "doughnut",
               data: {
                    labels: ["Jan", "feb", "March", "April", "May", "June", "July", "August", "Sept", "Oct", "Nov", "Dec"],
                    datasets: [
                         {
                              label: "No.of visitors(2020)",
                              fill: false,
                              lineTension: 0,
                              data: [12, 19, 3, 5, 2, 3, 6, 1, 5, 100],
                              borderWidth: 3,
                              borderColor: "rgba(255,255,255,0.5)",
                              borderCapStyle: "butt",
                              number: [20, 10, 30, 40],
                              pointBackgroundColor: "rgba(255,255,255,0.5)",
                              borderColor: ["#fc5185"],
                              hoverBackgroundColor: "rgba(232,105,90,0.8)",
                              backgroundColor: [
                                   "rgba(255, 99, 132, 0.2)",
                                   "rgba(54, 162, 235, 0.2)",
                                   "rgba(255, 206, 86, 0.2)",
                                   "rgba(75, 192, 192, 0.2)",
                                   "rgba(153, 102, 255, 0.2)",
                                   "rgba(255, 159, 64, 0.2)"
                              ],
                              borderColor: [
                                   "rgba(255, 99, 132, 1)",
                                   "rgba(54, 162, 235, 1)",
                                   "rgba(255, 206, 86, 1)",
                                   "rgba(75, 192, 192, 1)",
                                   "rgba(153, 102, 255, 1)",
                                   "rgba(255, 159, 64, 1)"
                              ]
                         }
                    ]
               },
               options: {
                    scales: {
                         yAxes: [
                              {
                                   stacked: true,
                                   ticks: {
                                        max: 200,
                                        min: 0,
                                        stepSize: 10,
                                        beginAtZero: true,
                                        fontColor: "white",
                                        fontSize: 14.5
                                   }
                              }
                         ],
                         xAxes: [
                              {
                                   ticks: {
                                        fontColor: "white",
                                        fontSize: 14.5,
                                        stepSize: 1,
                                        beginAtZero: true
                                   }
                              }
                         ]
                    },
                    legend: {
                         display: true,
                         position: "bottom",
                         labels: {
                              // This more specific font property overrides the global property
                              fontColor: "white",
                              fontSize: 14.5
                         }
                    }
               }
          });
     </script>
</div>
