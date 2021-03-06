$('.card').click(function() {
    $(this).toggleClass('flipped');
});

function showTime() {
    var date = new Date();
    var h = date.getHours(); // 0 - 23
    var m = date.getMinutes(); // 0 - 59
    var s = date.getSeconds(); // 0 - 59
    var session = "AM";

    if (h == 0) {
        h = 12;
    }

    if (h > 12) {
        h = h - 12;
        session = "PM";
    }

    h = (h < 10) ? "0" + h : h;
    m = (m < 10) ? "0" + m : m;
    s = (s < 10) ? "0" + s : s;

    var time = h + ":" + m + ":" + s + " " + session;
    document.getElementById("MyClockDisplay").innerText = time;
    document.getElementById("MyClockDisplay").textContent = time;

    setTimeout(showTime, 1000);

}

showTime();

const DATA = [{
        id: 0,
        title: "tile1",
        startTime: new Date(Date.UTC(2018, 1, 26, 5, 0, 0)),
        endTime: new Date(Date.UTC(2018, 1, 26, 6, 0, 0))
    },
    {
        id: 1,
        title: "tile2",
        startTime: new Date(Date.UTC(2018, 1, 26, 8, 0, 0)),
        endTime: new Date(Date.UTC(2018, 1, 26, 10, 0, 0))
    },
    {
        id: 2,
        title: "tile3",
        startTime: new Date(Date.UTC(2018, 1, 26, 9, 30, 0)),
        endTime: new Date(Date.UTC(2018, 1, 26, 10, 30, 0))
    },
    {
        id: 3,
        title: "tile3",
        startTime: new Date(Date.UTC(2018, 1, 26, 9, 30, 0)),
        endTime: new Date(Date.UTC(2018, 1, 26, 11, 0, 0))
    },
    {
        id: 4,
        title: "tile3",
        startTime: new Date(Date.UTC(2018, 1, 26, 9, 30, 0)),
        endTime: new Date(Date.UTC(2018, 1, 26, 11, 30, 0))
    },
    {
        id: 5,
        title: "tile3",
        startTime: new Date(Date.UTC(2018, 1, 26, 12, 30, 0)),
        endTime: new Date(Date.UTC(2018, 1, 26, 13, 30, 0))
    }
];

// Mins to pixels ratio
const scheduleState = {
    startTime: new Date(Date.UTC(2018, 1, 26, 7, 45, 0)),
    zoom: 1
}

const settings = {
    tileMargin: 10,
    tileHeight: 20,
    tileTop: 20
};

// Get reference to schedule
const schedule = document.getElementById('schedule');

// Set up event handlers
const btnZoomIn = document.getElementById('btnZoomIn');
const btnZoomOut = document.getElementById('btnZoomOut');

btnZoomIn.addEventListener('click', btnZoomInHandler, false);
btnZoomOut.addEventListener('click', btnZoomOutHandler, false);

render();

function render() {
    renderSchedule();
    renderTimeline();
    updateDate(scheduleState.startTime);
}

function setScheduleEndTime(scheduleState, schedule) {
    if (scheduleState.hasOwnProperty('zoom') === false) {
        throw new Error(`scheduleState does not have zoom property`);
    }
    if (scheduleState.hasOwnProperty('startTime') === false) {
        throw new Error(`scheduleState does not have startTime property`);
    }
    // Check if schedule is a HTMLElement
    if (!(schedule instanceof HTMLElement)) {
        throw new Error('schedule is not an HTMLCollection');
    }

    // Convert pixel width of schedule to minutes using zoom (pixels:mins)
    const scheduleWidthMins = schedule.offsetWidth / scheduleState.zoom;
    // Set scheduleEndTime to start time then add scheduleWidthMins to get end time
    let scheduleEndTime = new Date(scheduleState.startTime);
    // Need to convert scheduleWidthMins to milliseconds, add, create new date.
    scheduleEndTime = new Date(scheduleEndTime.getTime() + new Date(scheduleWidthMins * 60000).getTime());

    return scheduleEndTime;
}

function createTileElement(tileData, schedule) {
    // Check tileData has the properties expected
    if (
        tileData.hasOwnProperty('id') === false ||
        tileData.hasOwnProperty('title') === false ||
        tileData.hasOwnProperty('startTime') === false ||
        tileData.hasOwnProperty('endTime') === false
    ) {
        throw new Error(`tileData (id:${tileData.id}) object does not have required properties`);
    }
    // Check if schedule is a HTMLElement
    if (!(schedule instanceof HTMLElement)) {
        throw new Error('schedule is not an HTMLCollection');
    }
    // check times are Date objects
    if (!(tileData.startTime instanceof Date) || !(tileData.endTime instanceof Date)) {
        throw new Error(`tileData (id:${tileData.id}) expected Date object for time`);
    }

    const tileDiv = document.createElement("div");
    tileDiv.className = "tile";

    // difference from start time in ms
    let left = tileData.startTime - scheduleState.startTime
    let width = tileData.endTime - tileData.startTime

    // to mins
    left /= 60000;
    width /= 60000;


    // convert minutes to pixels with the .zoom scale
    tilePos = {
        left: left * scheduleState.zoom,
        width: width * scheduleState.zoom,
        height: settings.tileHeight,
        top: settings.tileTop
    };

    // Collision Detection of tile
    let scheduleChildren = schedule.children;
    // Array.from() used as a workaround for Edge. Edge does not support
    // HTMLCollection with 'for of'
    if (!(typeof scheduleChildren[Symbol.iterator] === 'function')) {
        scheduleChildren = Array.from(scheduleChildren)
    }

    for (let element of scheduleChildren) {
        if (
            element.offsetLeft < tilePos.left + tilePos.width &&
            element.offsetLeft + element.offsetWidth > tilePos.left &&
            element.offsetTop < tilePos.top + tilePos.height &&
            element.offsetTop + element.offsetHeight > tilePos.top
        ) {
            // Move conflicting tile down
            tilePos.top += element.offsetHeight + settings.tileMargin;
        }
        // collision detected!
        tileDiv.style.top = `${tilePos.top}px`;
    }

    // Set content & tile div absolute positions
    tileDiv.dataset.id = tileData.id;
    tileDiv.innerText = tileData.title;
    tileDiv.style.left = `${tilePos.left}px`;
    tileDiv.style.width = `${tilePos.width}px`;
    tileDiv.style.height = `${tilePos.height}px`;
    tileDiv.style.top = `${tilePos.top}px`;

    return tileDiv;
}

function renderSchedule() {
    // Clear schedule
    schedule.innerHTML = "";

    // Draw schedule grid
    // renderScheduleGrid();

    // Save to scheduleState
    scheduleState.scheduleEndTime = setScheduleEndTime(scheduleState, schedule);

    // Create div for each data
    for (let tileData of DATA) {
        // difference from start time in ms
        const left = tileData.startTime - scheduleState.startTime
        const width = tileData.endTime - tileData.startTime
        const maxWidth = scheduleState.scheduleEndTime - scheduleState.startTime
        if (left + width >= 0 && left <= maxWidth) {
            const tileDiv = createTileElement(tileData, schedule);
            // Add tile to schedule
            schedule.appendChild(tileDiv);
        }
    }
}

function renderScheduleGrid() {

    const grid = document.createDocumentFragment();


    // Convert UTC time in ms to mins
    const startTimeInMins = scheduleState.startTime.getTime() / 60000;
    // Convert pixel width of schedule to minutes using zoom (pixels:mins)
    const scheduleWidthMins = schedule.offsetWidth * scheduleState.zoom;
    // If first time is a whole hour place at 0px
    // otherwise offset by number of mins
    var startX;
    if ((startTimeInMins % 60) === 0) {
        startX = 0;
    } else {
        startX = (60 - (startTimeInMins % 60)) * scheduleState.zoom;
    }

    // 60 minutes * schedule zoom
    const hourSpacing = 60 * scheduleState.zoom;

    // +hourSpacing to make enough room to add leading time 1hr before start
    const timelineWidth = timeline.offsetWidth + hourSpacing;

    // to ensure that only the remain time/width after the first whole hour after
    // scheduleState.startTime is used
    const timelineWidthAdjustedForStartX = timelineWidth - startX;

    // With the remain timeline width work out how many time blocks to create
    const numberOfHourLines = timelineWidthAdjustedForStartX / hourSpacing;

    // Create a hour grid line for each hour
    for (let i = 0; i < numberOfHourLines - 1; i++) {
        const hourLine = createSVGGridLine();
        // console.log(hourLine.width);
        hourLine.style.marginLeft = `${hourSpacing - 5}px`
        grid.appendChild(hourLine);
    }
    grid.firstElementChild.style.marginLeft = `${startX - 2.5}px`;


    schedule.appendChild(grid);

}

function createSVGGridLine() {
    const marginTop = 5;
    const svg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
    svg.setAttributeNS(null, 'width', '5');
    svg.setAttributeNS(null, 'height', schedule.offsetHeight);
    svg.style.marginTop = `${marginTop}px`;

    const lineElement = document.createElementNS("http://www.w3.org/2000/svg", 'path');
    lineElement.setAttributeNS(null, 'd', `M2.5 3.5v${schedule.offsetHeight - marginTop}`);
    lineElement.setAttributeNS(null, 'stroke', '#4D4D4D');
    lineElement.setAttributeNS(null, 'stroke-linecap', 'square');

    const circleElement = document.createElementNS("http://www.w3.org/2000/svg", 'circle');
    circleElement.setAttributeNS(null, 'cx', '2.5');
    circleElement.setAttributeNS(null, 'cy', '2.5');
    circleElement.setAttributeNS(null, 'r', '2.5');
    circleElement.setAttributeNS(null, 'fill', '#4D4D4D');

    svg.appendChild(lineElement);
    svg.appendChild(circleElement);

    return svg;
}

function btnZoomInHandler(e) {
    e.preventDefault();
    scheduleState.zoom += 0.1;
    render();
}

function btnZoomOutHandler(e) {
    e.preventDefault();
    scheduleState.zoom -= 0.1;
    // Ensure zoom doesn't go less than 0.1 to avoid display issues
    if (scheduleState.zoom < 0.1) {
        scheduleState.zoom = 0.1;
    }
    render();
}

function renderTimeline() {
    // Convert UTC time in ms to mins
    const startTimeInMins = scheduleState.startTime.getTime() / 60000;

    // Get reference to timeline element
    const timeline = document.getElementById('timeline');

    // Clear the timeline
    timeline.innerHTML = "";

    // Convert pixel width of schedule to minutes using zoom (pixels:mins)
    const scheduleWidthMins = schedule.offsetWidth * scheduleState.zoom;

    // If first time is a whole hour place at 0px
    // otherwise offset by number of mins
    var startX;
    var time = new Date(scheduleState.startTime.getTime());
    if ((startTimeInMins % 60) === 0) {
        startX = 0;
        // - 2 hours becuase we will initally add an hour in the for loop and
        // the first time block is going to be an hour before the schedule start
        time.setUTCHours(time.getUTCHours() - 2, 0, 0, 0);
    } else {
        startX = (60 - (startTimeInMins % 60)) * scheduleState.zoom;
        time.setUTCHours(time.getUTCHours() - 1, 0, 0, 0);
    }

    // 60 minutes * schedule zoom
    const timeBlockWidth = 60 * scheduleState.zoom;

    // +timeBlockWidth to make enough room to add leading time 1hr before start
    const timelineWidth = timeline.offsetWidth + timeBlockWidth;

    // to ensure that only the remain time/width after the first whole hour after
    // scheduleState.startTime is used
    const timelineWidthAdjustedForStartX = timelineWidth - startX;

    // With the remain timeline width work out how many time blocks to create
    const numberOfTimeBlocks = timelineWidthAdjustedForStartX / timeBlockWidth;

    // Create a timeBlockElement for each
    for (let i = 0; i < numberOfTimeBlocks; i++) {
        time.setUTCHours(time.getUTCHours() + 1);
        const TimeBlockDiv = createTimeBlockElement(time, timeBlockWidth, startX);
        timeline.appendChild(TimeBlockDiv);
    }
    // Set the first timeblock margin to position entire timeline
    // - timeBlockWidth as start X is position of first schedule time
    // However, the first actual time (normally not visible) block is 1hr before.
    // *1.5 to center the text over the actual time
    timeline.firstElementChild.style.marginLeft = `${startX - timeBlockWidth * 1.5}px`;
}

function createTimeBlockElement(time, timeBlockWidth, startX) {
    // check time is a Date object
    if (!(time instanceof Date)) {
        throw new Error(`time is not time`);
    }

    // Convert pixel width of schedule to minutes using zoom (pixels:mins)
    const scheduleWidthMins = schedule.offsetWidth * scheduleState.zoom;

    // Create a div and add its css class
    const tbDiv = document.createElement('div');
    tbDiv.className = 'timeBlock';

    // Format the hours and minutes strings to display
    var hours, minutes;
    if (time.getUTCHours() < 10) {
        hours = `0${time.getUTCHours()}`;
    } else {
        hours = time.getUTCHours();
    }

    if (time.getUTCMinutes() < 10) {
        minutes = `0${time.getUTCMinutes()}`;
    } else {
        minutes = time.getUTCMinutes();
    }

    // Set the width, calculated in renderTimeline()
    tbDiv.style.width = `${timeBlockWidth}px`;

    // Create spans with repestive classes for hours and minutes
    // Append them to the timeBlock div
    const timeDiv = document.createElement('div');
    timeDiv.className = 'time';
    const hoursSpan = document.createElement('span');
    hoursSpan.className = 'hours';
    hoursSpan.innerText = hours;
    const minutesSpan = document.createElement('span');
    minutesSpan.className = 'minutes';
    minutesSpan.innerText = minutes;
    timeDiv.appendChild(hoursSpan);
    timeDiv.appendChild(minutesSpan);
    tbDiv.appendChild(timeDiv);

    return tbDiv;
}

function updateDate(date) {
    const dateDd = document.getElementById('date-dd');
    dateDd.innerText = date.getUTCDate();

    const ordinalIndicator = document.getElementById('date-ordinalIndicator');

    switch (date.getUTCDate()) {
        case 1:
        case 21:
        case 31:
            ordinalIndicator.innerText = 'st';
            break;
        case 2:
        case 22:
            ordinalIndicator.innerText = 'nd';
            break;
        case 3:
            ordinalIndicator.innerText = 'rd';
            break;
        default:
            ordinalIndicator.innerText = 'th';
    }

    const daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    const dateDdd = document.getElementById('date-ddd');
    dateDdd.innerText = daysOfWeek[date.getUTCDay()];

    const months = ['January', 'Februrary', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    const dateMmmYYYY = document.getElementById('date-mmmYYYY');
    const month = months[date.getUTCMonth()];
    const yyyy = date.getUTCFullYear();
    dateMmmYYYY.innerText = `${month} ${yyyy}`;

}

// Globals for dragging
let lastXPos, dragging;

// Add listeners for mouse, touch and wheel (could use new pointer events)
schedule.addEventListener('mousedown', onMouseDown, false);
schedule.addEventListener('touchstart', onTouchStart, false);
schedule.addEventListener('wheel', onWheelEvent, false);

// wheel event handler. simply scroll by the wheel delta
function onWheelEvent(e) {
    e.preventDefault();
    scrollSchedule(e.deltaX)
}


// Only if left mouse is pressed. Start drag and set up 'ending drag' events
function onMouseDown(e) {
    if (e.button === 0) {
        lastXPos = e.pageX - timeline.offsetLeft;
        dragging = true;
        schedule.addEventListener('mousemove', onMouseDrag, false);
        window.addEventListener('mouseup', stopDrag, false);
    }
}

function onMouseDrag(e) {
    if (dragging) {
        e.stopPropagation();
        scrollSchedule(lastXPos - (e.pageX - timeline.offsetLeft));
        lastXPos = e.pageX - timeline.offsetLeft;
    }
}

function stopDrag(e) {
    dragging = false;
    document.removeEventListener('mousemove', onMouseDrag);
    document.removeEventListener('mouseup', stopDrag);
}

function onTouchStart(e) {
    e.preventDefault();
    if (e.touches.length === 1) {
        lastXPos = e.touches[0].pageX - timeline.offsetLeft;
        dragging = true;
        document.addEventListener('touchmove', onTouchMove, false);
        document.addEventListener('touchend', onTouchEnd, false);
        document.addEventListener('touchcancel', onTouchEnd, false)
    }
}

function onTouchMove(e) {
    event.preventDefault();
    if (dragging && e.touches.length === 1) {
        scrollSchedule(lastXPos - (e.touches[0].pageX - timeline.offsetLeft));
        lastXPos = e.pageX - timeline.offsetLeft;
    }
}

function onTouchEnd(e) {
    event.preventDefault();
    if (event.touches.length === 0) {
        dragging = false;
        document.removeEventListener('touchmove', onTouchMove);
        document.removeEventListener('touchend', onTouchEnd);
        document.removeEventListener('touchcancel', onTouchEnd);
    }
}

function scrollSchedule(dx = 0) {
    const currentMins = scheduleState.startTime.getUTCMinutes();
    scheduleState.startTime.setUTCMinutes(currentMins + dx);
    render();
}
var contador = 0,
    select_opt = 0;

function add_to_list() {
    var action = document.querySelector('#action_select').value,
        description = document.querySelector('.input_description').value,
        title = document.querySelector('.input_title_desc').value,
        date = document.getElementById('date_select').value;


    switch (action) {
        case "SHOPPING":
            select_opt = 0;
            break;
        case "WORK":
            select_opt = 1;
            break;
        case "SPORT":
            select_opt = 2;
            break;
        case "MUSIC":
            select_opt = 3;
            break;
    }

    var class_li = ['list_shopping list_dsp_none', 'list_work list_dsp_none', 'list_sport list_dsp_none', 'list_music list_dsp_none'];

    var cont = '<div class="col_md_1_list">    <p>' + action + '</p>    </div> <div class="col_md_2_list"> <h4>' + title + '</h4> <p>' + description + '</p> </div>    <div class="col_md_3_list"> <div class="cont_text_date"> <p>' + date + '</p>  </div>  <div class="cont_btns_options">    <ul>  <li><a href="#finish" onclick="finish_action(' + select_opt + ',' + contador + ');" ><i class="material-icons">&#xE5CA;</i></a></li>   </ul>  </div>    </div>';

    var li = document.createElement('li')
    li.className = class_li[select_opt] + " li_num_" + contador;

    li.innerHTML = cont;
    document.querySelectorAll('.cont_princ_lists > ul')[0].appendChild(li);

    setTimeout(function() {
        document.querySelector('.li_num_' + contador).style.display = "block";
    }, 100);

    setTimeout(function() {
        document.querySelector('.li_num_' + contador).className = "list_dsp_true " + class_li[select_opt] + " li_num_" + contador;
        contador++;
    }, 200);

}

function finish_action(num, num2) {

    var class_li = ['list_shopping list_dsp_true', 'list_work  list_dsp_true', 'list_sport list_dsp_true', 'list_music list_dsp_true'];
    console.log('.li_num_' + num2);
    document.querySelector('.li_num_' + num2).className = class_li[num] + " list_finish_state";
    setTimeout(function() {
        del_finish();
    }, 500);
}

function del_finish() {
    var li = document.querySelectorAll('.list_finish_state');
    for (var e = 0; e < li.length; e++) {
        /* li[e].style.left = "-100px"; */
        li[e].style.opacity = "0";
        li[e].style.height = "0px";
        li[e].style.margin = "0px";
    }

    setTimeout(function() {
        var li = document.querySelectorAll('.list_finish_state');
        for (var e = 0; e < li.length; e++) {
            li[e].parentNode.removeChild(li[e]);
        }
    }, 500);


}
var t = 0;

function add_new() {
    if (t % 2 == 0) {
        document.querySelector('.cont_crear_new').className = "cont_crear_new cont_crear_new_active";

        document.querySelector('.cont_add_titulo_cont').className = "cont_add_titulo_cont cont_add_titulo_cont_active";
        t++;
    } else {
        document.querySelector('.cont_crear_new').className = "cont_crear_new";
        document.querySelector('.cont_add_titulo_cont').className = "cont_add_titulo_cont";
        t++;
    }
}

$('.dropdown-toggle').click(function(e) {
    e.preventDefault();
    e.stopPropagation();
    $(this).closest('.search-dropdown').toggleClass('open');
});

$('.dropdown-menu > li > a').click(function(e) {
    e.preventDefault();
    var clicked = $(this);
    clicked.closest('.dropdown-menu').find('.menu-active').removeClass('menu-active');
    clicked.parent('li').addClass('menu-active');
    clicked.closest('.search-dropdown').find('.toggle-active').html(clicked.html());
});

$(document).click(function() {
    $('.search-dropdown.open').removeClass('open');
});