
<!--**********************************
    Scripts
	
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.7.1/spectrum.min.js"></script>
	
***********************************-->

    <script src="{{url('admin/vendor/global/global.min.js')}}"></script>

    <script src="{{url('admin/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
    <script src="{{url('admin/vendor/chart-js/chart.bundle.min.js')}}"></script>
    <script src="{{url('admin/vendor/bootstrap-datetimepicker/js/moment.js')}}"></script>
    <script src="{{url('admin/vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


		    <script src="{{url('admin/js/plugins-init/chartjs-init.js')}}"></script>

    <script src="{{url('admin/vendor/apexchart/apexchart.js')}}"></script>



		    <script src="{{url('admin/vendor/peity/jquery.peity.min.js')}}"></script>

    <script src="{{url('admin/js/dashboard/dashboard-1.js')}}"></script>

	<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
	
    <script src="{{url('admin/js/custom.min.js')}}"></script>
    <script src="{{url('admin/js/deznav-init.js')}}"></script>
	<script src="{{url('admin/js/owl.js')}}"></script>
    <script src="{{url('admin/js/demo.js')}}"></script>

	 



	<script>



function preview_images() {
    var total_file = document.getElementById("formFileLg").files.length;
    for (var i = 0; i < total_file; i++) {
        $("#image_preview").append(`
                <div class=''><input onclick="return resetForm();" type="reset" class="btn btn-danger" name='reset_images' value="Delete Image"/>
                    <img style='width:100%' class='img-responsive' src='${URL.createObjectURL(event.target.files[i])}'>
                </div>`);
    }
}
function resetForm() {
    $("#image_preview").html("");
    return true;
}


$('.clients-carousel').owlCarousel({
		loop: true,
		nav: true,
		dots: false,
		autoHeight: true,
		smartSpeed: 500,
		margin: 10,
		autoplayHoverPause: false,
		autoplay: true,
		            autoplayTimeout: 3000,
			navText: [ '<span class="fal fa-angle-left"></span>', '<span class="fal fa-angle-right"></span>' ],
		responsive: {
			0: {
				items: 2
			},
			768: {
				items: 3
			},
			1200: {
				items: 5
			}
		}
	});



$('.evcard-carousel').owlCarousel({
		loop: true,
		nav: true,
		dots: false,
		autoHeight: true,
		smartSpeed: 500,
		margin: 0,
		autoplayHoverPause: false,
		autoplay: true,
		            autoplayTimeout: 3000,
			navText: [ '<span class="fal fa-angle-left"></span>', '<span class="fal fa-angle-right"></span>' ],
		responsive: {
			0: {
				items: 1
			},
			768: {
				items: 1
			},
			1200: {
				items: 1
			}
		}
	});





	$('.chats-slider').owlCarousel({
		loop: false,
		nav: true,
		dots: false,
		autoHeight: true,
		smartSpeed: 500,
		margin: 0,
		autoplayHoverPause: false,
		autoplay: true,
		            autoplayTimeout: 3000,
			navText: [ '<span class="fal fa-angle-left"></span>', '<span class="fal fa-angle-right"></span>' ],
		responsive: {
			0: {
				items: 1
			},
			768: {
				items: 1
			},
			1200: {
				items: 1
			}
		}
	});



  $('#colorselector').change(function(){
    $('.newtype').hide();
    $('#' + $(this).val()).show();
    if($(this).val() == 'all') {
      $('.newtype').show();
    }
  });




	</script>



	<script>


		const months = [
"Jan",
 "Feb",
 "Mar",
 "Apr",
 "May",
 "Jun",
 "July",
 "Aug",
 "Sept",
 "Oct",
 "Nov",
 "Dece"
];

const weekdays = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];



// Váriavel principal
let date = new Date();

// Função que retorna a data atual do calendário
function getCurrentDate(element, asString) {
    if (element) {
        if (asString) {
            return element.textContent = weekdays[date.getDay()] + ', ' + date.getDate() + "  " + months[date.getMonth()] + "  " + date.getFullYear();
        }
        return element.value = date.toISOString().substr(0, 10);
    }
    return date;
}


// Função principal que gera o calendário
function generateCalendar() {

    // Pega um calendário e se já existir o remove
    const calendar = document.getElementById('calendar');
    if (calendar) {
        calendar.remove();
    }

    // Cria a tabela que será armazenada as datas
    const table = document.createElement("table");
    table.id = "calendar";

    // Cria os headers referentes aos dias da semana
    const trHeader = document.createElement('tr');
    trHeader.className = 'weekends';
    weekdays.map(week => {
        const th = document.createElement('th');
        const w = document.createTextNode(week.substring(0, 3));
        th.appendChild(w);
        trHeader.appendChild(th);
    });

    // Adiciona os headers na tabela
    table.appendChild(trHeader);

    //Pega o dia da semana do primeiro dia do mês
    const weekDay = new Date(
        date.getFullYear(),
        date.getMonth(),
        1
    ).getDay();

    //Pega o ultimo dia do mês
    const lastDay = new Date(
        date.getFullYear(),
        date.getMonth() + 1,
        0
    ).getDate();

    let tr = document.createElement("tr");
    let td = '';
    let empty = '';
    let btn = document.createElement('button');
    let week = 0;

    // Se o dia da semana do primeiro dia do mês for maior que 0(primeiro dia da semana);
    while (week < weekDay) {
        td = document.createElement("td");
        empty = document.createTextNode(' ');
        td.appendChild(empty);
        tr.appendChild(td);
        week++;
    }

    // Vai percorrer do 1º até o ultimo dia do mês
    for (let i = 1; i <= lastDay;) {
        // Enquanto o dia da semana for < 7, ele vai adicionar colunas na linha da semana
        while (week < 7) {
            td = document.createElement('td');
            let text = document.createTextNode(i);
            btn = document.createElement('button');
            btn.className = "btn-day";
            btn.addEventListener('click', function () { changeDate(this) });
            week++;



            // Controle para ele parar exatamente no ultimo dia
            if (i <= lastDay) {
                i++;
                btn.appendChild(text);
                td.appendChild(btn)
            } else {
                text = document.createTextNode(' ');
                td.appendChild(text);
            }
            tr.appendChild(td);
        }
        // Adiciona a linha na tabela
        table.appendChild(tr);

        // Cria uma nova linha para ser usada
        tr = document.createElement("tr");

        // Reseta o contador de dias da semana
        week = 0;
    }
    // Adiciona a tabela a div que ela deve pertencer
    const content = document.getElementById('table');
    content.appendChild(table);
    changeActive();
    changeHeader(date);
    document.getElementById('date').textContent = date;
    getCurrentDate(document.getElementById("currentDate"), true);
    getCurrentDate(document.getElementById("date"), false);
}

// Altera a data atráves do formulário
function setDate(form) {
    let newDate = new Date(form.date.value);
    date = new Date(newDate.getFullYear(), newDate.getMonth(), newDate.getDate() + 1);
    generateCalendar();
    return false;
}

// Método Muda o mês e o ano do topo do calendário
function changeHeader(dateHeader) {
    const month = document.getElementById("month-header");
    if (month.childNodes[0]) {
        month.removeChild(month.childNodes[0]);
    }
    const headerMonth = document.createElement("h1");
    const textMonth = document.createTextNode(months[dateHeader.getMonth()].substring(0, 3) + " " + dateHeader.getFullYear());
    headerMonth.appendChild(textMonth);
    month.appendChild(headerMonth);
}

// Função para mudar a cor do botão do dia que está ativo
function changeActive() {
    let btnList = document.querySelectorAll('button.active');
    btnList.forEach(btn => {
        btn.classList.remove('active');
    });
    btnList = document.getElementsByClassName('btn-day');
    for (let i = 0; i < btnList.length; i++) {
        const btn = btnList[i];
        if (btn.textContent === (date.getDate()).toString()) {
            btn.classList.add('active');
        }
    }
}

// Função que pega a data atual
function resetDate() {
    date = new Date();
    generateCalendar();
}

// Muda a data pelo numero do botão clicado
function changeDate(button) {
    let newDay = parseInt(button.textContent);
    date = new Date(date.getFullYear(), date.getMonth(), newDay);
    generateCalendar();
}

// Funções de avançar e retroceder mês e dia
function nextMonth() {
    date = new Date(date.getFullYear(), date.getMonth() + 1, 1);
    generateCalendar(date);
}

function prevMonth() {
    date = new Date(date.getFullYear(), date.getMonth() - 1, 1);
    generateCalendar(date);
}


function prevDay() {
    date = new Date(date.getFullYear(), date.getMonth(), date.getDate() - 1);
    generateCalendar();
}

function nextDay() {
    date = new Date(date.getFullYear(), date.getMonth(), date.getDate() + 1);
    generateCalendar();
}

document.onload = generateCalendar(date);



</script>



<script>
/*
$('#bold').on('click', function() {
   document.execCommand('bold', false, null);
});

$('#italic').on('click', function() {
   document.execCommand('italic', false, null);
});

$('#underline').on('click', function() {
   document.execCommand('underline', false, null);
});

$('#align-left').on('click', function() {
   document.execCommand('justifyLeft', false, null);
});

$('#align-center').on('click', function() {
   document.execCommand('justifyCenter', false, null);
});

$('#align-right').on('click', function() {
   document.execCommand('justifyRight', false, null);
});

$('#list-ul').on('click', function() {
   document.execCommand('insertUnorderedList', false, null);
});

$('#list-ol').on('click', function() {
   document.execCommand('insertOrderedList', false, null);
});

$('#fonts').on('change', function() {
   var font = $(this).val();
   document.execCommand('fontName', false, font);
});

$('#size').on('change', function() {
   var size = $(this).val();
   $('.editor').css('fontSize', size + 'px');
});

$('#color').spectrum({
   color: '#000',
   showPalette: true,
   showInput: true,
   showInitial: true,
   showInput: true,
   preferredFormat: "hex",
   showButtons: false,
   change: function(color) {
      color = color.toHexString();
      document.execCommand('foreColor', false, color);
   }
});

$('.editor').perfectScrollbar();*/
</script>


    {{--  @dd($pages_p)  --}}
