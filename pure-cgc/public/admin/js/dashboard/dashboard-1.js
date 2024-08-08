(function($) {
    /* "use strict" */


 var dzChartlist = function(){
	
	var screenWidth = $(window).width();
	
	
		
	var activityBar = function(){
		var style = getComputedStyle(document.body);
		var chartCol = style.getPropertyValue('--primary');
		var activity = document.getElementById("activityLine");
		var inputs = {
			min: 20,
			max: 80,
			count: 8,
			decimals: 2,
			continuity: 1
		};
		if (activity !== null) {
			var activityData = [{
					first: [50, 75, 34, 55, 25, 70, 30, 80, 30, 90, 25, 65]
				},
				{
					first: [50, 35, 10, 45, 40, 50, 60, 35, 10, 70, 34, 35]
				},
				{
					first: [20, 35, 70, 45, 40, 35, 30, 35, 10, 40, 60, 20]
				}
			];
			/* activityLine.height = 100;
			// Get the reference to the existing chart with ID 'barChart_1'
			var existingChart = Chart.getChart(activityLine.canvas.id);

			// Check if the chart exists
			if (existingChart) {
				// Destroy the existing chart
				existingChart.destroy();
			} */
			activity.height = 350;
			
			var config = {
				type: "line",
				data: {
					labels: [
						"January",
						"February",
						"March",
						"April",
						"May",
						"June",
						"July",
						"August",
						"September",
						"October",
						"November",
						"December",
					],
					datasets: [
						{
							label: "My First dataset",
							data:  [50, 75, 34, 55, 25, 70, 30, 80, 30, 90, 25, 65],
							//borderColor: '#2130b8',
							borderColor: chartCol,
							borderWidth: "5",
							barThickness:'flex',
							backgroundColor: 'rgba(47, 76, 221, 0.05)',
							minBarLength:10,
							tension:0.5,
						}
					]
				},
				options: {
					responsive: true,
					maintainAspectRatio: false,
					plugins:{
						legend:false,	
					},
					
					legend: {
						display: false
					},
					scales: {
						y: {
							max: 100,
							min: 0,
							grid:{
								color: "rgba(0,0,0,0.1)",
								height: 50,
								drawBorder: true
							},
							ticks: {
								color: "#585858",
								
								stepSize: 20
							},
						},
						x: {
							barPercentage: 0.3,
							
							grid: {
								color: "rgba(0,0,0,0.1)",
								display: false,
								zeroLineColor: "transparent"
							},
							ticks: {
								stepSize: 50,
								fontColor: "#585858",
								fontFamily: "Nunito, sans-serif"
							}
						}
					},
					tooltips: {
						mode: "index",
						intersect: false,
						titleFontColor: "#888",
						bodyFontColor: "#555",
						titleFontSize: 12,
						bodyFontSize: 15,
						backgroundColor: "rgba(255,255,255,1)",
						displayColors: true,
						xPadding: 10,
						yPadding: 7,
						borderColor: "rgba(220, 220, 220, 1)",
						borderWidth: 1,
						caretSize: 6,
						caretPadding: 10
					}
				}
			};
			var activityBar = new Chart(activity, config);

                var element = document.querySelector('body');
                var observer = new MutationObserver(function(mutations) {
                    mutations.forEach(function(mutation) {
                        if(mutation.attributeName === "data-theme-version"){
                            if($('body').attr('data-theme-version') === "dark"){
                                config.options.scales.y.grid.color = '#3d3d4e',
                                config.options.scales.x.grid.color = '#3d3d4e'
                            }else{
                                config.options.scales.y.grid.color = '#eee',
                                config.options.scales.x.grid.color = '#eee'
                            }
                            activityBar.update();
                        }
                    });
                });
                observer.observe(element, {
                    attributes: true
                });
			

			/* var ctx = document.getElementById("activityLine").getContext("2d"); */
			/* var myLine = new Chart(activity, config); */

			var items = document.querySelectorAll("#user-activity .nav-tabs .nav-item");
			items.forEach(function(item, index) {
				item.addEventListener("click", function() {
					config.data.datasets[0].data = activityData[index].first;
					activityBar.update();
				});
			});
			$('input[name="primary_bg"]').on('click', function() {
				///console.log(chartCol);
				config.data.datasets[0].borderColor = chartCol;
				activityBar.update();
			})
			
		}
	}
	
	
	
	
	
	
	var chartTimeline = function(){
		
		var optionsTimeline = {
			chart: {
				type: "bar",
				height: 400,
				stacked: true,
				toolbar: {
					show: false
				},
				sparkline: {
					//enabled: true
				},
				offsetX: -10,
			},
			series: [
				 {
					name: "chartTimeline",
					data: [75, 150, 225]
				}
			],
			
			plotOptions: {
				bar: {
					columnWidth: "25%",
					endingShape: "rounded",
					startingShape: "rounded",
					
					colors: {
						backgroundBarColors: [									  							"rgba(6, 127, 4, 0.5)",

																				"rgba(217, 19, 19, 1)",
							"rgba(239, 203, 16, 1)",],
						backgroundBarOpacity: 1,
						backgroundBarRadius: 5,
					},

				},
				distributed: true
			},
			colors:['#f00','#000','#900'],
			grid: {
				show: false,
			},
			legend: {
				show: false
			},
			fill: {
			  opacity: 1
			},
			dataLabels: {
				enabled: false,
				colors: ['#000'],
				dropShadow: {
				  enabled: true,
				  top: 1,
				  left: 1,
				  blur: 1,
				  opacity: 1
			  }
			},
			xaxis: {
			 categories: ['06', '07', '08',],
			  labels: {
			   style: {
				  colors: '#787878',
				  fontSize: '13px',
				  fontFamily: 'poppins',
				  fontWeight: 100,
				  cssClass: 'apexcharts-xaxis-label',
				},
			  },
			  crosshairs: {
				show: false,
			  },
			  axisBorder: {
				  show: false,
				},
			},
			
			yaxis: {
				show: false
			},
			
			tooltip: {
				x: {
					show: true
				}
			}
		};
		var chartTimelineRender =  new ApexCharts(document.querySelector("#chartTimeline"), optionsTimeline);
		 chartTimelineRender.render();
	}
	
	/*
	var donutChart = function(){
		var options = {
			series: [25, 35, 45],
			colors:['#ff7a00', '#2130b8', '#21b830'],
			chart: {
				width: 220,
				height: 220,
				type: 'donut',
				sparkline: {
					enabled: true,
				},
				
			},
			plotOptions: {
				pie: {
					customScale: 1,
					donut: {
						size: '40%'
						
					}
				}
			},
			dataLabels: {
				enabled: false
			},
			responsive: [{
				breakpoint: 1300,
				options: {
					chart: {
						width: 120,
						height: 120
					},
				}
			}],
			legend: {
				show: false
			}
        };
        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
	}*/
	var ticketSoldChart = function(){
			//#ticketSold
		if(jQuery('#ticketSold').length > 0 ){
		const ticketSold = document.getElementById("ticketSold").getContext('2d');
		
		ticketSold.height = 100;

		let barChartData = {
			defaultFontFamily: 'Poppins',
			labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
			datasets: [{
				label: 'Expense',
				backgroundColor: '#2130b8',
				hoverBackgroundColor: '#142193', 
				barThickness:"18",

				data: [
					'20',
					'14',
					'18',
					'25',
					'27',
					'22',
					'12', 
					'24', 
					'20', 
					'14', 
					'18', 
					'16'
				]
			}, {
				label: 'Earning',
				backgroundColor: '#f0f0f0',
				hoverBackgroundColor: '#e6e6e6',
				barThickness:"15", 
				data: [
					'12',
					'18',
					'14',
					'7',
					'5',
					'10',
					'20', 
					'8', 
					'12', 
					'18', 
					'14', 
					'16'
				]
			}]

		};

		new Chart(ticketSold, {
			type: 'bar',
			data: barChartData,
			options: {
				plugins:{
					legend:false,	
				},
				legend: {
					display: false
				}, 
				title: {
					display: false
				},
				tooltips: {
					mode: 'index',
					intersect: false
				},
				responsive: true,
				maintainAspectRatio: false, 
				scales: {
					x: {
						display: true, 
						stacked: true,
						barPercentage: 0.25, 
						barThickness:15,
						ticks: {
							display: true
						}, 
						grid: {
							display: false, 
							drawBorder: false,
						},
						border: {
							display: false, 
						},
					},
					y: {
						display: true, 
						stacked: true, 
						grid: {
							display: false, 
							drawBorder: false,
						},
						border: {
							display: false, 
						},						
						ticks: {
							display: false
						}
					}
				}
			}
		});
		}
	}
	var peityPrimary = function(){
		$(".peity-primary").peity("line", {
			fill: ["rgba(33, 48, 184, .2)"], 
			stroke: '#2130b8', 
			strokeWidth: '4', 
			width: "80",
			height: "50"
		});
	}
	var scheduleEvent = function(){
		if(screenWidth < 1400 ){
			/* jQuery('.schedule-event').on('click',function(){
				jQuery('.event-sidebar').toggleClass('active');				
			});
			jQuery('.event-sidebar').removeClass('active');	  */				
		}
	}
	
	
	/* Function ============ */
		return {
			init:function(){
			},
			
			
			
			load:function(){
				activityBar();
				chartTimeline();
				donutChart();
				ticketSoldChart();
				peityPrimary();
				scheduleEvent();
			},
			
			resize:function(){
				activityBar();
			}
		}
	
		jQuery(document).ready(function(){
			
		});
	}();

		
	jQuery(window).on('load',function(){
		setTimeout(function(){
			dzChartlist.load();
		}, 1000); 
		
	});

	jQuery(window).on('resize',function(){
		
		
	});     

})(jQuery);




/*******************************/
/*******************************/
/*******************************/


var optionster = {
  series: [
    {
      data: [ 250, 105, 50,]
    }
  ],
  chart: {
    type: "bar",
    height: 280,		stacked: true,
		          toolbar: {
            show: false
          },
  },
  plotOptions: {
    bar: {
      horizontal: false,
      distributed: true,
      startingShape: "rounded",
      endingShape: "rounded",
	  columnWidth: '30px',
	  
	  
	  					colors: {
backgroundBarColors: [									  							
"rgba(6, 127, 4, 0.5)",
"rgba(217, 19, 19, 0.5)",
"rgba(239, 203, 16, 0.5)",],
backgroundBarOpacity: 1,
backgroundBarRadius: 9,
					},
					
		/*			
      colors: {
        backgroundBarColors: ["#eee"],
        backgroundBarOpacity: 1,
        backgroundBarRadius: 9
      }*/
    }
  },
  dataLabels: {
    enabled: false
  },
  grid: {
    yaxis: {
      lines: {
        show: true
      },
	      yaisBorder: {
      show: true
    }
    }
  },
  xaxis: {
    axisBorder: {
      show: true
    },
    categories: [
      "Confirmed",
      "Reject",
      "Maybe",

    ]
  },
  colors: [									  							
"rgba(6, 127, 4, 1)",
"rgba(217, 19, 19, 1)",
"rgba(239, 203, 16, 1)",],
  legend: {
    show: false
  }
};

var chart = new ApexCharts(document.querySelector("#chart-001"), optionster);
chart.render();


/*******************************/
/*******************************/
/*******************************/

var options = {
  chart: {
      height: 110,
      type: 'radialBar',
  },
  series: [70],
  legend: false,
  label: false,
    plotOptions: {
    radialBar: {
      hollow: {
        margin: 0,
        size: "30%"
      },
	}
  },
  labels: ['Confirmed'],

		  		fill: {
                    opacity: 1.5,
                    colors: ['#067f04'],
					width: 20,
                    type: 'gradient',
                    gradient: {
                        gradientToColors: ['#067f04'],
                        shadeIntensity: 1,
                        opacityFrom: 1,
                        opacityTo: 2,
                        stops: [0, 50, 100],
                        inverseColors: false
                    },
                },

}

var chart = new ApexCharts(document.querySelector("#charts-01"), options);

chart.render();


/*******************************/
/*******************************/
/*******************************/

var options = {
  chart: {
      height: 110,
      type: 'radialBar',
  },
  series: [40],
  legend: false,
  label: false,
    plotOptions: {
    radialBar: {
      hollow: {
        margin: 0,
        size: "30%"
      },
	}
  },
  labels: ['Reject'],
		  
		  		fill: {
                    opacity: 1.5,
                    colors: ['#d91313'],
					width: 20,
                    type: 'gradient',
                    gradient: {
                        gradientToColors: ['#d91313'],
                        shadeIntensity: 1,
                        opacityFrom: 1,
                        opacityTo: 2,
                        stops: [0, 50, 100],
                        inverseColors: false
                    },
                },

}

var chart = new ApexCharts(document.querySelector("#charts-02"), options);

chart.render();

/*******************************/
/*******************************/
/*******************************/

var options = {
  chart: {
      height: 110,
      type: 'radialBar',
  },
  series: [20],
  legend: false,
  label: false,
    plotOptions: {
    radialBar: {
      hollow: {
        margin: 0,
        size: "30%"
      },
	}
  },
  labels: ['Maybe'],

		  		fill: {
                    opacity: 1.5,
                    colors: ['#efcb10'],
					width: 20,
                    type: 'gradient',
                    gradient: {
                        gradientToColors: ['#efcb10'],
                        shadeIntensity: 1,
                        opacityFrom: 1,
                        opacityTo: 2,
                        stops: [0, 50, 100],
                        inverseColors: false
                    },
                },

}

var chart = new ApexCharts(document.querySelector("#charts-03"), options);

chart.render();



/*******************************/
/*******************************/
/*******************************/

var options = {
  chart: {
      height: 110,
      type: 'radialBar',
  },
  series: [100],
  legend: false,
  label: false,
    plotOptions: {
    radialBar: {
      hollow: {
        margin: 0,
        size: "30%"
      },
	}
  },
  labels: ['Total'],

		  		fill: {
                    opacity: 1.5,
                    colors: ['#043B44'],
					width: 20,
                    type: 'gradient',
                    gradient: {
                        gradientToColors: ['#043B44'],
                        shadeIntensity: 1,
                        opacityFrom: 1,
                        opacityTo: 2,
                        stops: [0, 50, 100],
                        inverseColors: false
                    },
                },

}

var chart = new ApexCharts(document.querySelector("#charts-04"), options);

chart.render();




/*******************************/
/*******************************/
/*******************************/



var options = {
  series: [
    {
      name: 'average',
      data: [405]
    },
    {
      name: 'range',
      data: [55]
    }
  ],
  chart: {
    height: 100,
    type: 'bar',
    stacked: true,
    toolbar: {
      show: false
    }
  },
  colors: ['#043B44', '#ccc'],
  dataLabels: {
    style: {
      colors: ['#fff']
    }
  },

  plotOptions: {
    bar: {
      horizontal: true,
	    legend: false,
      startingShape: "rounded",
      endingShape: "rounded",
	  columnhieght: '30px',
  label: false,
    }
  },
  
  
    grid: {
    yaxis: {
      lines: {
        show: false
      },
	      labels: {
      show: false,
      trim: false
    },
	      yaisBorder: {
      show: false
    }
    }
  },
  xaxis: {
	  lines: {
        show: false
      },
    axisBorder: {
      show: false
    },
    categories: [
      " ",

    ],
    max: 460,
    labels: {
      show: false,
      trim: false
    }
  },
  
/*
  xaxis: {
	  
	  			  axisBorder: {
				  show: false,
				},
				
    categories: ["Total WhatsApp Statistic",],
	    labels: {
      show: false,
      trim: false
    }
  },
  yaxis: {
	  	  			  axisBorder: {
				  show: false,
				},
				
    max: 460,
    labels: {
      show: false,
      trim: false
    }
  }*/
}
  
 var chart = new ApexCharts(document.querySelector("#chart-total"), options);
 chart.render();
  




/*******************************/
/**************         Email Statistic           *****************/
/*******************************/

var options = {
  chart: {
      height: 110,
      type: 'radialBar',
  },
  series: [70],
  legend: false,
  label: false,
    plotOptions: {
    radialBar: {
      hollow: {
        margin: 0,
        size: "30%"
      },
	}
  },
  labels: ['Confirmed'],

		  		fill: {
                    opacity: 1.5,
                    colors: ['#067f04'],
					width: 20,
                    type: 'gradient',
                    gradient: {
                        gradientToColors: ['#067f04'],
                        shadeIntensity: 1,
                        opacityFrom: 1,
                        opacityTo: 2,
                        stops: [0, 50, 100],
                        inverseColors: false
                    },
                },

}

var chart = new ApexCharts(document.querySelector("#email-01"), options);

chart.render();


/*******************************/
/**************         Email Statistic           *****************/
/*******************************/

var options = {
  chart: {
      height: 110,
      type: 'radialBar',
  },
  series: [40],
  legend: false,
  label: false,
    plotOptions: {
    radialBar: {
      hollow: {
        margin: 0,
        size: "30%"
      },
	}
  },
  labels: ['Reject'],
		  
		  		fill: {
                    opacity: 1.5,
                    colors: ['#d91313'],
					width: 20,
                    type: 'gradient',
                    gradient: {
                        gradientToColors: ['#d91313'],
                        shadeIntensity: 1,
                        opacityFrom: 1,
                        opacityTo: 2,
                        stops: [0, 50, 100],
                        inverseColors: false
                    },
                },

}

var chart = new ApexCharts(document.querySelector("#email-02"), options);

chart.render();

/*******************************/
/**************         Email Statistic           *****************/
/*******************************/

var options = {
  chart: {
      height: 110,
      type: 'radialBar',
  },
  series: [20],
  legend: false,
  label: false,
    plotOptions: {
    radialBar: {
      hollow: {
        margin: 0,
        size: "30%"
      },
	}
  },
  labels: ['Maybe'],

		  		fill: {
                    opacity: 1.5,
                    colors: ['#efcb10'],
					width: 20,
                    type: 'gradient',
                    gradient: {
                        gradientToColors: ['#efcb10'],
                        shadeIntensity: 1,
                        opacityFrom: 1,
                        opacityTo: 2,
                        stops: [0, 50, 100],
                        inverseColors: false
                    },
                },

}

var chart = new ApexCharts(document.querySelector("#email-03"), options);

chart.render();



/*******************************/
/**************         Email Statistic           *****************/
/*******************************/

var options = {
  chart: {
      height: 110,
      type: 'radialBar',
  },
  series: [100],
  legend: false,
  label: false,
    plotOptions: {
    radialBar: {
      hollow: {
        margin: 0,
        size: "30%"
      },
	}
  },
  labels: ['Total'],

		  		fill: {
                    opacity: 1.5,
                    colors: ['#043B44'],
					width: 20,
                    type: 'gradient',
                    gradient: {
                        gradientToColors: ['#043B44'],
                        shadeIntensity: 1,
                        opacityFrom: 1,
                        opacityTo: 2,
                        stops: [0, 50, 100],
                        inverseColors: false
                    },
                },

}

var chart = new ApexCharts(document.querySelector("#email-04"), options);

chart.render();






var options = {
  series: [
    {
      name: 'average',
      data: [405]
    },
    {
      name: 'range',
      data: [55]
    }
  ],
  chart: {
    height: 100,
    type: 'bar',
    stacked: true,
    toolbar: {
      show: false
    }
  },
  colors: ['#043B44', '#ccc'],
  dataLabels: {
    style: {
      colors: ['#fff']
    }
  },

  plotOptions: {
    bar: {
      horizontal: true,
	    legend: false,
      startingShape: "rounded",
      endingShape: "rounded",
	  columnhieght: '30px',
  label: false,
    }
  },
  
  
    grid: {
    yaxis: {
      lines: {
        show: false
      },
	      labels: {
      show: false,
      trim: false
    },
	      yaisBorder: {
      show: false
    }
    }
  },
  xaxis: {
	  lines: {
        show: false
      },
    axisBorder: {
      show: false
    },
    categories: [
      " ",

    ],
    max: 460,
    labels: {
      show: false,
      trim: false
    }
  },
  
/*
  xaxis: {
	  
	  			  axisBorder: {
				  show: false,
				},
				
    categories: ["Total WhatsApp Statistic",],
	    labels: {
      show: false,
      trim: false
    }
  },
  yaxis: {
	  	  			  axisBorder: {
				  show: false,
				},
				
    max: 460,
    labels: {
      show: false,
      trim: false
    }
  }*/
}
  
 var chart = new ApexCharts(document.querySelector("#email-total"), options);
 chart.render();
  
  
  
  
  /*******************************/
/*******************************/
/*******************************/


var opti = {
  series: [
    {
      data: [ 250, 105, 50,]
    }
  ],
  chart: {
    type: "bar",
    height: 280,		stacked: true,
		          toolbar: {
            show: false
          },
  },
  plotOptions: {
    bar: {
      horizontal: false,
      distributed: true,
      startingShape: "rounded",
      endingShape: "rounded",
	  columnWidth: '30px',
	  
	  
	  					colors: {
backgroundBarColors: [									  							
"rgba(6, 127, 4, 0.5)",
"rgba(217, 19, 19, 0.5)",
"rgba(239, 203, 16, 0.5)",],
backgroundBarOpacity: 1,
backgroundBarRadius: 9,
					},
					
		/*			
      colors: {
        backgroundBarColors: ["#eee"],
        backgroundBarOpacity: 1,
        backgroundBarRadius: 9
      }*/
    }
  },
  dataLabels: {
    enabled: false
  },
  grid: {
    yaxis: {
      lines: {
        show: true
      },
	      yaisBorder: {
      show: true
    }
    }
  },
  xaxis: {
    axisBorder: {
      show: true
    },
    categories: [
      "Confirmed",
      "Reject",
      "Maybe",

    ]
  },
  colors: [									  							
"rgba(6, 127, 4, 1)",
"rgba(217, 19, 19, 1)",
"rgba(239, 203, 16, 1)",],
  legend: {
    show: false
  }
};

var chart = new ApexCharts(document.querySelector("#email-001"), opti);
chart.render();