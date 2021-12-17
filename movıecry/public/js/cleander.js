$(function() {

    var sliderWidth = $('.slider').width();
    var nowLi = 12;
    var li_count = $('.slider li').length;

    $('.slider ul').css({ width: li_count * sliderWidth });
    $('.slider li').css({ width: sliderWidth });

    for (var i = 0; i < li_count; i++) {
        $('.sliderControl').append('<a></a>');
    }


    $('.sliderControl a, .slider li').click(function() {
        nowLi = $(this).index();
        sliderChange();
        $('.sliderControl a').eq(nowLi).css({ 'background-color': '#F6C555' });
        $('.sliderControl a').eq(nowLi).siblings().css({ 'background-color': '#333' });
        $('.slider li').eq(nowLi).css({ 'transform': 'rotateY(0)' });
        $('.slider li').eq(nowLi).prevAll().css({ 'transform': 'rotateY(60deg)' });
        $('.slider li').eq(nowLi).nextAll().css({ 'transform': 'rotateY(-60deg)' });
        $('.slider li').eq(0).css({ 'left': '-60px' });
    })


    function sliderChange() {
        $('.slider ul').stop(true, false).animate({ left: sliderWidth * nowLi * -1 }, 500);
    }

    var timer = setInterval(perpic, 800);

    function perpic() {
        console.log('nowLi = ' + nowLi)
        nowLi++;
        if (nowLi >= li_count) {
            nowLi = 0;
        };
        sliderChange();
        $('.sliderControl a').eq(nowLi).css({ 'background-color': '#F6C555' });
        $('.sliderControl a').eq(nowLi).siblings().css({ 'background-color': '#333' });
        $('.slider li').eq(nowLi).css({ 'transform': 'rotateY(0)' });
        $('.slider li').eq(nowLi).prevAll().css({ 'transform': 'rotateY(60deg)' });
        $('.slider li').eq(nowLi).nextAll().css({ 'transform': 'rotateY(-60deg)' });
    }

    $('.slider').hover(function() {
        clearInterval(timer);
        $('.timer .percentage').removeClass('gogo');
    }, function() {
        timer = setInterval(perpic, 5000);
        $('.timer .percentage').addClass('gogo');
    })

})

function FetchCtrl($scope, $http, $templateCache) {
    $scope.method = 'GET';
    $scope.url = 'http://yousee.tv/rest/tvguide/nowandnext/API-Key/cMy34N4qFOUfq5WfesmvgiEdcC6PCyHa6JYqOMbq';
    $scope.fetch = function() {
        $scope.code = null;
        $scope.response = null;

        $http({ method: $scope.method, url: $scope.url, cache: $templateCache }).
        success(function(data, status) {
            $scope.status = status;
            $scope.data = data;
        }).
        error(function(data, status) {
            $scope.data = data || "Request failed";
            $scope.status = status;
        });
    };

    $scope.progress = function(sStart, sEnd) {
        var from = parseInt(sStart.replace(/\./g, ''));
        var toEnd = parseInt(sEnd.replace(/\./g, ''));
        var duration = toEnd - from;
        var now = new Date();
        var iMin = now.getMinutes();
        iMin = ((iMin < 10) ? '0' : '') + '' + iMin
        now = parseInt(now.getHours() + '' + iMin);
        var sLeft = toEnd - now;
        return 100 - (sLeft / duration * 100);

    }

    $scope.watch = function(schannel) {
        window.open('http://yousee.tv/livetv/' + schannel + '/');
    }

    $scope.updateModel = function(method, url) {
        $scope.method = method;
        $scope.url = url;
    };

    $scope.fetch();
    window.setInterval(function() {
        $scope.fetch();
    }, 60 * 1000);

    $scope.predicate = 'channel_info.name';
    $scope.filter = function(desc) {
        return desc;
    }
}

document.querySelector("#page-header > div > div:nth-child(2) > div:nth-child(2)")


scheduler.locale.labels.timeline_tab = "Timeline";
scheduler.locale.labels.section_custom = "Section";
scheduler.config.details_on_create = true;
scheduler.config.details_on_dblclick = true;

//===============
//Configuration
//===============
var sections = [
    { key: 1, label: "James Smith" },
    { key: 2, label: "John Williams" },
    { key: 3, label: "David Miller" },
    { key: 4, label: "Linda Brown" }
];

scheduler.createTimelineView({
    name: "timeline",
    x_unit: "minute",
    x_date: "%H:%i",
    x_step: 30,
    x_size: 24,
    x_start: 16,
    x_length: 48,
    y_unit: sections,
    y_property: "section_id",
    render: "bar"
});

//===============
//Data loading
//===============
scheduler.config.lightbox.sections = [
    { name: "description", height: 130, map_to: "text", type: "textarea", focus: true },
    { name: "custom", height: 23, type: "select", options: sections, map_to: "section_id" },
    { name: "time", height: 72, type: "time", map_to: "auto" }
];

scheduler.init('scheduler_here', new Date(2017, 5, 30), "timeline");
scheduler.parse([
    { start_date: "2017-06-30 09:00", end_date: "2017-06-30 12:00", text: "Task A-12458", section_id: 1 },
    { start_date: "2017-06-30 10:00", end_date: "2017-06-30 16:00", text: "Task A-89411", section_id: 1 },
    { start_date: "2017-06-30 10:00", end_date: "2017-06-30 14:00", text: "Task A-64168", section_id: 1 },
    { start_date: "2017-06-30 16:00", end_date: "2017-06-30 17:00", text: "Task A-46598", section_id: 1 },

    { start_date: "2017-06-30 12:00", end_date: "2017-06-30 20:00", text: "Task B-48865", section_id: 2 },
    { start_date: "2017-06-30 14:00", end_date: "2017-06-30 16:00", text: "Task B-44864", section_id: 2 },
    { start_date: "2017-06-30 16:30", end_date: "2017-06-30 18:00", text: "Task B-46558", section_id: 2 },
    { start_date: "2017-06-30 18:30", end_date: "2017-06-30 20:00", text: "Task B-45564", section_id: 2 },

    { start_date: "2017-06-30 08:00", end_date: "2017-06-30 12:00", text: "Task C-32421", section_id: 3 },
    { start_date: "2017-06-30 14:30", end_date: "2017-06-30 16:45", text: "Task C-14244", section_id: 3 },

    { start_date: "2017-06-30 09:20", end_date: "2017-06-30 12:20", text: "Task D-52688", section_id: 4 },
    { start_date: "2017-06-30 11:40", end_date: "2017-06-30 16:30", text: "Task D-46588", section_id: 4 },
    { start_date: "2017-06-30 12:00", end_date: "2017-06-30 18:00", text: "Task D-12458", section_id: 4 }
], "json");