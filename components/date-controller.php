<link href='/assets/scripts/packages/core/main.css' rel='stylesheet' />
<link href='/assets/scripts/packages/daygrid/main.css' rel='stylesheet' />

<script src='/assets/scripts/packages/core/main.js'></script>
<script src='/assets/scripts/packages/daygrid/main.js'></script>
<script src='/assets/scripts/packages/interaction/main.js'></script>

<div class="zone-label">
    Time Zone: GMT+1
</div>
<br><br>
<div id='calendar'></div>
<br>
<div class="time-main hidden" id="timeMain">
    <h4 class="zone-label">Time Slots</h4>
    <div>
        <div class="time-slots" id="time-slot-con">
        </div>
        <div id="loader-con" class="hidden">
            <i class="loading" style="color: #ff4f3b"  data-feather="loader"></i>
        </div>
    </div>
</div>

<script>
    var selectedTime = null;
    var selectedSlot = null;
    var selectedSlotId = null;
    var activeFunctionContent = null
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        const timeMain = $("#timeMain");
        const complianceDate = $("#complianceDate");

        var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: [ 'dayGrid', 'interaction' ],
            defaultView: 'dayGridMonth',
            selectAllow: function(select) {
                return moment().diff(select.start) <= 0
            },
            selectable: true,
            dateClick: function(info) {
                activeFunctionContent = '<?php echo $decoded_function_data["id"] ?>'
                if(moment().diff(info.date) >= 0) return;
                $(".day-highlight").removeClass("day-highlight");
                $(info.dayEl).addClass("day-highlight");
                selectedTime = moment(info.date).format("MMMM Do, YYYY");
                $(".time-card").removeClass("selected");
                $('#book-next').addClass("hidden")
                selectedSlot = null;
                complianceDate.text(selectedTime);
                fetchtimeSlot(selectedTime)
                if(timeMain.hasClass("hidden")){
                    timeMain.removeClass("hidden")
                }
            }
        });

        calendar.render();

    });

    function setTimeSlot(id, startTime, endTime, status) {
        if(!status) return;
        const complianceDate = $("#complianceDate");
        const complianceSlot = $("#time-slot"+id);
        $(".time-card").removeClass("selected");
        complianceSlot.addClass("selected")
        complianceDate.text(selectedTime + "  |  " + `${startTime} - ${endTime}`);
        selectedSlot = `${startTime} - ${endTime}`;
        selectedSlotId = id;
        $('#book-next').removeClass("hidden")
    }

    function fetchtimeSlot(selectedTime) {
        const timeSlotCon = $("#time-slot-con");
        const loaderCon = $("#loader-con");
        loaderCon.removeClass("hidden");
        timeSlotCon.html('');
        axios.get(FUNCTION_TIMESLOT+`?function_content.slug=<?php  echo $decoded_function_data["slug"]?>`).then(
            res => {
                if(res.data[0]){
                    axios.get(FUNCTION_ALLOCATION+`?date=${selectedTime}&function_content.slug=<?php  echo $decoded_function_data["slug"]?>`).then(
                        rep => {
                            timeSlotCon.html('');
                            loaderCon.addClass("hidden");
                            for(var i = 0; i<res.data.length; i++){

                                var dataPass = res.data[i];
                                const isActive = rep.data.some(o => o["function_timeslot"]["id"] === res.data[i].id);

                                timeSlotCon.append(
                                    `
                                     <div class="time-card ${!isActive && 'active'}" id="time-slot${res.data[i].id}"
                                         onclick="setTimeSlot(${dataPass.id}, '${dataPass.start_time}', '${dataPass.end_time}', ${!isActive})">
                                        ${res.data[i].start_time} - ${res.data[i].end_time}
                                    </div>
                                    `
                                )
                            }

                        }
                    )
                }
                else{
                    loaderCon.addClass("hidden");
                    timeSlotCon.html('<div class="not-available">No time slot</div>');
                }

            },
        ).catch(
            err => {

            }
        )
    }

</script>