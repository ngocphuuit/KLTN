(function() {

  $(function() {
    /* START vMap Example
    */

    var chatWindow, d, datasets, date, g1, g2, g3, i, m, options, placeholder, plot, plotAccordingToChoices, renderVmap, updateScrollFeeds, vMap, vMapParent, y;
    vMap = $("#vmap-world");
    vMapParent = vMap.parent();
    options = {
      map: "world_en",
      backgroundColor: "#fff",
      color: "#ccc",
      hoverOpacity: 0.7,
      selectedColor: "#666666",
      enableZoom: true,
      showTooltip: true,
      values: sample_data,
      scaleColors: ["#C8EEFF", "#006491"],
      normalizeFunction: "polynomial"
    };
    renderVmap = function(selector, options) {
      selector.vectorMap(options);
    };
    vMap.width("100%");
    renderVmap(vMap, options);
    /* END Sparkline Example
    */

    /* START JustGage Examples
    */

    g1 = new JustGage({
      id: "g1",
      value: getRandomInt(0, 100),
      min: 0,
      max: 100,
      title: "CPU Load",
      label: "%",
      levelColorsGradient: false
    });
    g2 = new JustGage({
      id: "g2",
      value: getRandomInt(0, 100),
      min: 0,
      max: 1024,
      title: "Memory Usage",
      label: "MB",
      startAnimationTime: 2000,
      startAnimationType: ">",
      refreshAnimationTime: 1000,
      refreshAnimationType: "bounce"
    });
    g3 = new JustGage({
      id: "g3",
      value: getRandomInt(1800, 10000),
      min: 0,
      max: 10000,
      title: "Requets",
      label: ""
    });
    setInterval((function() {
      g1.refresh(getRandomInt(50, 100));
      return g3.refresh(getRandomInt(1800, 10000));
    }), 2500);
    setInterval((function() {
      return g2.refresh(getRandomInt(100, 1024));
    }), 3500);
    /* END JustGage Examples
    */

    /* START Flot Example
    */

    datasets = [
      {
        label: "Hồ Chí Minh",
        data: [[1, 13.4], [2, 12.2], [3, 10.6], [4, 10.2], [5, 10.1], [6, 9.7], [7, 9.5], [8, 9.7], [9, 9.9], [10, 9.9], [11, 9.9], [11.5, 10.3], [12, 10.5]],
        flag: "HCM"
      }, {
        label: "Hà Nội",
        data: [[1, 10.0], [2, 11.3], [3, 9.9], [4, 9.6], [5, 9.5], [6, 9.5], [7, 9.9], [8, 9.3], [8.4, 9.2], [8.7, 9.2], [9, 9.5], [10, 9.6], [10.5, 9.3], [11, 9.4], [12, 9.79]],
        flag: "HN"
      }, {
        label: "Đà Nẵng",
        data: [[3, 12.4], [4, 11.2], [5, 10.8], [6, 10.5], [7, 10.4], [8, 10.2], [9, 10.5], [10, 10.2], [11.2, 10.1], [11.4, 9.6], [12, 9.7]],
        flag: "ĐN"
      }, {
        label: "Khu Vực Khác",
        data: [[1, 5.8], [2, 6.0], [3, 5.9], [4, 5.5], [5, 5.7], [6, 5.3], [7, 6.1], [8, 5.4], [9, 5.4], [10, 5.1], [11, 5.2], [12, 5.4]],
        flag: "KVK"
      }
    ];
    options = {
      series: {
        lines: {
          show: true
        },
        points: {
          show: true
        }
      },
      legend: {
        noColumns: 2
      },
      xaxis: {
        tickDecimals: 0
      },
      yaxis: {
        min: 0
      },
      selection: {
        mode: "x"
      }
    };
    placeholder = $("#demo-plot");
    placeholder.bind("plotselected", function(event, ranges) {});
    plot = $.plot(placeholder, datasets, options);
    plotAccordingToChoices = function() {
      var data;
      data = void 0;
      data = [];
      if (data.length > 0) {
        return $.plot("#demo-plot", data, {
          yaxis: {
            min: 0
          },
          xaxis: {
            tickDecimals: 0
          }
        });
      }
    };
    i = 0;
    $.each(datasets, function(key, val) {
      val.color = i;
      return ++i;
    });
    plot.setSelection({
      xaxis: {
        from: 1994,
        to: 1995
      }
    });
    /* END Flot Example
    */

    /* START Full Calendar Example
    */
    date = new Date();
    d = date.getDate();
    m = date.getMonth();
    y = date.getFullYear();
    $("#demo-calendar1").fullCalendar({
      buttonText: {
        month: 'Tháng',
        week: 'Tuần',
        day: 'Ngày'
      },
      header: {
        left: "prev,next",
        center: "title",
        right: "month,agendaWeek,agendaDay",
      },
      dragOpacity: {
        month: .2,
        ''   : .5
      },
      editable: true,
      events: [
        {
          title: "Sẽ có event",
          start: new Date(y, m, 1)
        }, {
          title: "Kiểm tra báo cáo",
          start: new Date(y, m, d - 5),
          end: new Date(y, m, d - 2)
        }, {
          id: 999,
          title: "Có cuộc hẹn",
          start: new Date(y, m, d - 3, 16, 0),
          allDay: false
        }
      ]
    });
    /* END Full Calendar Example
    */

    /* START Sparkline Example
    */

    $("#compositebar").sparkline([50, 60, 62, 35, 40, 50, 38, 38, 38, 40, 60, 38, 50, 60, 38, 45, 62, 38, 38, 40, 30], {
      type: "line",
      width: "100px",
      height: "29px",
      drawNormalOnTop: false
    });
    /* END Sparkline Example
    */

    chatWindow = $(".chat-messages-list .content");
    if (ie === 8) {
      chatWindow.slimScroll({
        height: '400px'
      });
    } else {
      chatWindow.slimScroll({
        start: "bottom",
        railVisible: true,
        alwaysVisible: true,
        height: '400px'
      });
    }
    /* Activate the scrollbar for the feed lists
    */

    updateScrollFeeds = function() {
      return $("#feeds .content").slimScroll({
        height: '300px'
      });
    };
    $("#feeds a[data-toggle=\"tab\"]").on("shown", function(e) {
      updateScrollFeeds();
    });
    updateScrollFeeds();
    setTimeout((function() {
      if ($(".social-sidebar").hasClass('sidebar-full')) {
        $(".social-sidebar .user-settings").show();
      }
    }), 2000);
  });

}).call(this);
